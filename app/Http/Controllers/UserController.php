<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Roles;
use App\Kegiatan;
use Validator;
use Auth;
use Illuminate\Support\Facades\Session;
use Yajra\Datatables\Datatables;
use Laravel\Socialite\Facades\Socialite;
use function GuzzleHttp\Promise\all;
use App\Revisions;

class UserController extends Controller
{
    public function history()
    {
        $user = new Kegiatan();
        $data = $user->approved();

        // return view('dashboard.history');
        return Datatables::of($data)
        ->addColumn('action', function ($data) {
            // return "<a href='#" . $data->id . "'><i style='color:green;' class='btnValidate far fa-check-circle fa-lg' data-acara=" . $data->id . " data-placement='right' title='Klik untuk ACC Proposal'></i></a>
            // <a href='#'><i style='color:red;' class='btnDecline fas fa-ban fa-lg' data-toggle='modal' data-acara=" . $data->id . " data-target='#modalDosenDecline' data-placement='right' title='Klik untuk menolak Proposal'></i></a>
            // ";
            return $data->created_at->diffForHumans();
        })
        ->editColumn('anggaran', function ($data) {
            $hasil_rupiah = 'Rp ' . number_format($data->anggaran, 2, ',', '.');

            return $hasil_rupiah;
        })
        ->editColumn('tanggalAcara', function ($data) {
            return $data->tanggalAcara->format('d/M/Y');
        })
        ->addColumn('pathFile', function ($data) {
            return view('template.link', compact('data'));
        })
        ->rawColumns(['pathFile', 'action'])
        ->make(true);
    }

    public function getDosen()
    {
        $user = new User();
        $data = $user->dosenDashboard();

        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                return "<a href='#" . $data->id . "'><i style='color:green;' class='btnValidate far fa-check-circle fa-lg' data-acara=" . $data->id . " data-placement='right' title='Klik untuk ACC Proposal'></i></a>
                <a href='#'><i style='color:red;' class='btnDecline fas fa-ban fa-lg' data-toggle='modal' data-acara=" . $data->id . " data-target='#modalDosenDecline' data-placement='right' title='Klik untuk menolak Proposal'></i></a>
                ";
            })
            ->editColumn('anggaran', function ($data) {
                $hasil_rupiah = 'Rp ' . number_format($data->anggaran, 2, ',', '.');

                return $hasil_rupiah;
            })
            ->editColumn('tanggalAcara', function ($data) {
                return $data->tanggalAcara->format('d/M/Y');
            })
            ->addColumn('pathFile', function ($data) {
                return view('template.link', compact('data'));
            })
            ->rawColumns(['pathFile', 'action'])
            ->make(true);
    }

    /**
     * Proses setelah login maka akan menuju dashboard
     *
     * @return void
     */
    public function dashboard()
    {
        if (Auth::check() && Auth::user()->roleid == 1) {   // Check is user logged in
            $role = Auth::user()->roleid;
            $role = 'admin';
        } elseif (Auth::check() && Auth::user()->roleid == 10) {
            $role = 'dosen';
            $totalApproved = (new Kegiatan())->totalApproved();
        } elseif (Auth::check() && Auth::user()->roleid == 11) {
            $role = 'ormawa';
            $user = new User();
            $kegiatan = $user->ormawaDashboard();
            $tampung = [];

            foreach (Revisions::all() as $key => $value) {
                if (in_array($value->idAcara, $tampung)) {
                } else {
                    array_push($tampung, $value->idAcara);
                }
            }
        } elseif (Auth::check() && Auth::user()->roleid == 12) {
            $role = 'mahasiswa';
        } else {
            return redirect('/');
        }
        Session::put('roleid', Auth::user()->roleid);

        return view('dashboard', compact('role', 'kegiatan', 'data', 'totalApproved', 'tampung'));
    }

    /**
     * Proses logout
     *
     * logout semua role, admin atau user sekalipun
     *
     * @return void
     */
    public function logout()
    {
        Auth::logout();
        Session::flush();

        return redirect('/');
    }

    public function home()
    {
        $roles = Roles::all();

        return view('partial.formadd', ['roles' => $roles]);
    }

    public function login(Request $req)
    {
        $rules = [
            'user'         => 'required',
            'password'     => 'required'
        ];

        $validator = Validator::make($req->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('home')
            ->withErrors($validator)
            ->withInput($req->except('pass'));
        } else {
            $userdata = [
                'username' => $req->user,
                'password' => $req->password
            ];

            if (Auth::attempt($userdata)) {
                Session::put('username', $req->user);

                return redirect()->intended('dashboard');
            } else {
                // Jika login salah
                // return view('home')->withErrors($validator);
                return back()->withErrors(['msg'=>'Login salah']);
            }
        }
    }

    /**
     * Fungsi untuk melakukan registrasi user
     *
     * @param  Request $req
     * @return void
     */
    public function add(Request $req)
    {
        $req->validate([
            'username' => 'required',
            'email'    => 'required|unique:users',
            'password' => 'required|min:5',
            'role'     => 'required'
        ], [
            'email.requried' => 'Email harus diisi',
            'email.unique'   => 'Email sudah terdaftar',
            'password.min'   => 'Password minimal 5 karakter'
        ]);

        $user = User::create([
            'roleid'  => $req->role,
            'username'=> $req->username,
            'email'   => $req->email,
            'password'=> $req->password
        ]);

        return redirect()->to('/')->with('message', 'Registrasi Sukses');
    }

    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect('/');
        }

        $email = explode('@', $user->email)[1];

        if ($email !== 'student.unika.ac.id') {
            return redirect()->to('/');
        } else {
            $existingUser = User::where('email', $user->email)->first();

            if ($existingUser) {
                Session::put('username', $user->name);
                Auth::login($existingUser, true);
            } else {
                $newUser = new User;
                $newUser->username = explode('@', $user->email)[0];
                $newUser->email = $user->email;
                $newUser->roleid = 12;
                $newUser->password = bcrypt('qwerty');
                $newUser->save();
                Session::put('username', $user->name);
                Auth::login($newUser, true);
            }

            return redirect()->intended('dashboard');
        }
    }
}
