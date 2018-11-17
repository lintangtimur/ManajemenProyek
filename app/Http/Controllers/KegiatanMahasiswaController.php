<?php

namespace App\Http\Controllers;

use App\KegiatanMahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class KegiatanMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = new KegiatanMahasiswa();
        $data = $user->index();

        return Datatables::of($data)
            ->addColumn('status', function ($data) {
                if ($data->status == 0) {
                    return '<button type="button" class="btn btn-dark">not validated</button>';
                }

                return '<button type="button" class="btn btn-success">Validated</button>';
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
            ->rawColumns(['pathFile', 'status'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'namaAcara'    => 'required|max:100',
            'temaAcara'    => 'required',
            'tanggalAcara' => 'required',
            'tempatAcara'  => 'required',
            'berkasAcara'  => 'required|file|max:2000|mimes:jpeg,png'
        ]);

        $uploadedFile = $request->file('berkasAcara');
        $fileName = $uploadedFile->getClientOriginalName();
        $path = $uploadedFile->storeAs('public/files', $fileName);

        KegiatanMahasiswa::create([
            'uploaderId'   => Auth::user()->id,
            'namaAcara'    => $request->namaAcara,
            'temaAcara'    => $request->temaAcara,
            'tanggalAcara' => $request->tanggalAcara,
            'tempatAcara'  => $request->tempatAcara,
            'fileName'     => $fileName,
            'anggaran'     => 0,
            'pathFile'     => $path
        ]);

        return redirect()
        ->back()
        ->withSuccess(sprintf('File %s berhasil terupload', $fileName));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\KegiatanMahasiswa    $kegiatanMahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(KegiatanMahasiswa $kegiatanMahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\KegiatanMahasiswa    $kegiatanMahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(KegiatanMahasiswa $kegiatanMahasiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\KegiatanMahasiswa    $kegiatanMahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KegiatanMahasiswa $kegiatanMahasiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KegiatanMahasiswa    $kegiatanMahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(KegiatanMahasiswa $kegiatanMahasiswa)
    {
        //
    }
}
