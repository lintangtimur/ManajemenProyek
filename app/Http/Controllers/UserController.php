<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Roles;
use App\Kegiatan;
use Validator;
use Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
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
            $user = new User();
            $data = $user->dosenDashboard();
        } elseif (Auth::check() && Auth::user()->roleid == 11) {
            $role = 'ormawa';
            $user = new User();
            $kegiatan = $user->ormawaDashboard();
        } else {
            return redirect('/');
        }

        return view('dashboard', compact('role', 'kegiatan', 'data'));
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
}
