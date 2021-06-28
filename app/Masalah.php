<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Masalah extends Model
{
    protected $table = 'masalahs';

    protected $primaryKey = 'kode_masalah';
    protected $fillable = [
        'penyebab'
    ];

    public function penyebab()
    {
        return $this->hasMany(Penyebab::class,'kode_penyebab');
    }
}
