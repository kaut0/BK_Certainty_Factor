<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HasilDiagnosa extends Model
{
    protected $table = 'hasil_diagnosa';

    protected $primaryKey = 'id';
    protected $fillable = [
        'nama',
        'kelas',
        'permasalahan'
    ];
}
