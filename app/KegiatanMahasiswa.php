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
     * dashboard untuk index mahasiswa
     *
     * @param  string $iduser idUser
     * @return void
     */
    public function index($iduser)
    {
        return KegiatanMahasiswa::join('users', 'kegiatan_mahasiswas.uploaderId', '=', 'users.id')
            ->select('kegiatan_mahasiswas.id', 'kegiatan_mahasiswas.namaAcara', 'kegiatan_mahasiswas.temaAcara', 'kegiatan_mahasiswas.tanggalAcara', 'kegiatan_mahasiswas.tempatAcara', 'kegiatan_mahasiswas.fileName', 'kegiatan_mahasiswas.anggaran', 'kegiatan_mahasiswas.pathFile', 'kegiatan_mahasiswas.status', 'users.username')
            ->orderBy('tanggalAcara', 'DESC')
            ->where('kegiatan_mahasiswas.id', $iduser)
            ->get();
    }

    public function dosen()
    {
        return KegiatanMahasiswa::join('users', 'kegiatan_mahasiswas.uploaderId', '=', 'users.id')
            ->select('kegiatan_mahasiswas.id', 'kegiatan_mahasiswas.namaAcara', 'kegiatan_mahasiswas.temaAcara', 'kegiatan_mahasiswas.tanggalAcara', 'kegiatan_mahasiswas.tempatAcara', 'kegiatan_mahasiswas.fileName', 'kegiatan_mahasiswas.anggaran', 'kegiatan_mahasiswas.pathFile', 'kegiatan_mahasiswas.status', 'users.username')
            ->where('status', 0)
            ->orderBy('tanggalAcara', 'DESC')
            ->get();
    }

    public function historyMahasiswa()
    {
        return KegiatanMahasiswa::join('users', 'kegiatan_mahasiswas.uploaderId', '=', 'users.id')
            ->select('kegiatan_mahasiswas.id', 'kegiatan_mahasiswas.namaAcara', 'kegiatan_mahasiswas.temaAcara', 'kegiatan_mahasiswas.tanggalAcara', 'kegiatan_mahasiswas.tempatAcara', 'kegiatan_mahasiswas.fileName', 'kegiatan_mahasiswas.anggaran', 'kegiatan_mahasiswas.pathFile', 'kegiatan_mahasiswas.status', 'users.username', 'kegiatan_mahasiswas.updated_at')
            ->where('status', 1)
            ->orderBy('tanggalAcara', 'DESC')
            ->get();
    }
}
