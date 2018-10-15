<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'roleid'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    protected $table = 'users';

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    /**
     * dashboard untuk dosen
     *
     * @return Kegiatan
     */
    public function dosenDashboard()
    {
        // return Kegiatan::orderBy('tanggalAcara', 'DESC')->get();
        return Kegiatan::join('users', 'kegiatans.uploaderId', '=', 'users.id')
            ->select('kegiatans.id', 'kegiatans.namaAcara', 'kegiatans.temaAcara', 'kegiatans.tanggalAcara', 'kegiatans.tempatAcara', 'kegiatans.fileName', 'kegiatans.anggaran', 'kegiatans.pathFile', 'kegiatans.status', 'users.username')
            ->where('kegiatans.status', 0)
            ->orderBy('tanggalAcara', 'DESC')
            ->get();
    }

    /**
     * dashboard untuk ormawa
     *
     * @return Kegiatan
     */
    public function ormawaDashboard()
    {
        return Kegiatan::join('users', 'kegiatans.uploaderId', '=', 'users.id')
            ->select('kegiatans.id', 'kegiatans.namaAcara', 'kegiatans.temaAcara', 'kegiatans.tanggalAcara', 'kegiatans.tempatAcara', 'kegiatans.fileName', 'kegiatans.anggaran', 'kegiatans.pathFile', 'kegiatans.status', 'users.username')
            ->orderBy('tanggalAcara', 'DESC')
            ->get();
    }
}
