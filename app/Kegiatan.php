<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $fillable = [
        'uploaderId', 'namaAcara', 'temaAcara', 'tanggalAcara', 'tempatAcara', 'fileName', 'pathFile', 'anggaran'
    ];
}
