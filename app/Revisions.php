<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Revisions extends Model
{
    protected $fillable = [
        'idAcara', 'comment', 'commentId', 'judulrevisi'
    ];

    public function kegiatan()
    {
        return $this->belongsTo('App\Kegiatan');
    }
}
