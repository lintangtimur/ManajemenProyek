<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Kegiatan extends Model
{
    protected $dates = ['tanggalAcara'];
    protected $fillable = [
        'uploaderId', 'namaAcara', 'temaAcara', 'tanggalAcara', 'tempatAcara', 'fileName', 'pathFile', 'anggaran'
    ];

    /**
     * Mendapatkan total berapa proposal yang sudah di approved oleh dosen
     *
     * @return void
     */
    public function totalApproved()
    {
        return Kegiatan::where('status', '=', 1)->count();
    }

    /**
     * Mendapatkan kegiatan yang sudah di approved oleh dosen
     *
     * @return void
     */
    public function approved()
    {
        $sekarang = Carbon::now();

        return Kegiatan::join('users', 'kegiatans.uploaderId', '=', 'users.id')
            ->select('kegiatans.id', 'kegiatans.namaAcara', 'kegiatans.temaAcara', 'kegiatans.tanggalAcara', 'kegiatans.tempatAcara', 'kegiatans.fileName', 'kegiatans.anggaran', 'kegiatans.pathFile', 'kegiatans.status', 'users.username', 'kegiatans.updated_at')
            ->where('kegiatans.status', 1)
            ->where('tanggalAcara', '>', $sekarang)
            ->orderBy('tanggalAcara', 'ASC')
            ->take(9)
            ->get();
    }
}
