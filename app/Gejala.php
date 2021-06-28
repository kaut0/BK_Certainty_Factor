<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{

    protected $table = 'gejalas';

    protected $primaryKey = 'kode_gejala';
    protected $fillable = [
        'nama_gejala',
        'solusi'
    ];
    
    
    public function penyebab()
    {
        return $this->hasMany(Penyebab::class,'kode_penyebab');
    }
   
}
