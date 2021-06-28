<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class penyebab extends Model
{

    protected $table = 'penyebabs';

    protected $primaryKey = 'kode_penyebab';
    protected $fillable = [
        'penyebab',
        'cf',
        'gejala'
    ];

    public function gejala(){
        return $this->belongsTo(Gejala::class, 'gejala', 'kode_gejala');
    }

    public function masalah()
    {
        return $this->belongsTo(Masalah::class,'penyebab', 'kode_masalah');
    }
}
