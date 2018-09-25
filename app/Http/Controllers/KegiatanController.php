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
            'berkasAcara'  => 'required|file|max:2000|mimes:docx,doc,pdf',
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
}
