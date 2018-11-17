<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KegiatanMahasiswa extends Model
{
    protected $dates = ['tanggalAcara'];
    protected $fillable = [
        'uploaderId', 'namaAcara', 'temaAcara', 'tanggalAcara', 'tempatAcara', 'fileName', 'pathFile', 'anggaran'
    ];

    /**
     * dashboard untuk dosen
     *
     */
    public function index()
    {
        return KegiatanMahasiswa::join('users', 'kegiatan_mahasiswas.uploaderId', '=', 'users.id')
            ->select('kegiatan_mahasiswas.id', 'kegiatan_mahasiswas.namaAcara', 'kegiatan_mahasiswas.temaAcara', 'kegiatan_mahasiswas.tanggalAcara', 'kegiatan_mahasiswas.tempatAcara', 'kegiatan_mahasiswas.fileName', 'kegiatan_mahasiswas.anggaran', 'kegiatan_mahasiswas.pathFile', 'kegiatan_mahasiswas.status', 'users.username')
            ->orderBy('tanggalAcara', 'DESC')
            ->get();
    }
}
