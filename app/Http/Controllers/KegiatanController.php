<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kegiatan;
use Auth;

class KegiatanController extends Controller
{
    public function upload(Request $req)
    {
        $this->validate($req, [
            'namaAcara'    => 'required|max:100',
            'temaAcara'    => 'required',
            'tanggalAcara' => 'required',
            'tempatAcara'  => 'required',
            'berkasAcara'  => 'required|file|max:2000',
            'anggaranAcara'=> 'required'
        ]);

        $uploadedFile = $req->file('berkasAcara');
        $fileName = $uploadedFile->getClientOriginalName();
        $path = $uploadedFile->storeAs('public/files', $fileName);

        Kegiatan::create([
            'uploaderId'   => Auth::user()->id,
            'namaAcara'    => $req->namaAcara,
            'temaAcara'    => $req->temaAcara,
            'tanggalAcara' => $req->tanggalAcara,
            'tempatAcara'  => $req->tempatAcara,
            'fileName'     => $fileName,
            'pathFile'     => $path,
            'anggaran'     => str_replace(',', '', $req->anggaranAcara)
        ]);

        return redirect()
        ->back()
        ->withSuccess(sprintf('File %s berhasil terupload', $fileName));
    }

    /**
     * Update status proposal menjadi ACC
     *
     * @param  Request $req
     * @return void
     */
    public function accKegiatan(Request $req)
    {
        // dd($req->id);
        $res = Kegiatan::where('id', $req->id)->update(['status'=>1]);
        $resp = [
            'status'       => 'success',
            'affectedRows' => $res
        ];

        return response()->json($resp);
    }

    public function get($idacara)
    {
        return Kegiatan::where('id', $idacara)->get()->toJSON();
    }

    public function update(Request $req)
    {
        $this->validate($req, [
            'edit_namaAcara'    => 'required|max:100',
            'edit_temaAcara'    => 'required',
            'edit_tanggalAcara' => 'required',
            'edit_tempatAcara'  => 'required',
            'edit_berkasAcara'  => 'required|file|max:2000',
            'edit_anggaranAcara'=> 'required'
        ]);

        $uploadedFile = $req->file('edit_berkasAcara');
        $fileName = $uploadedFile->getClientOriginalName();
        $path = $uploadedFile->storeAs('public/files', $fileName);

        $data = Kegiatan::where('id', $req->edit_idacara)->first();
        // dd($data);
        $data->namaAcara = $req->edit_namaAcara;
        $data->temaAcara = $req->edit_temaAcara;
        $data->tanggalAcara = $req->edit_tanggalAcara;
        $data->tempatAcara = $req->edit_tempatAcara;
        $data->anggaran = $req->edit_anggaranAcara;
        $data->fileName = $fileName;
        $data->pathFile = $path;
        $data->save();

        return redirect()
        ->back()
        ->withSuccess(sprintf('File %s berhasil terupload', $fileName));
    }
}
