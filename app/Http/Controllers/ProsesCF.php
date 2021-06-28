<?php

namespace App\Http\Controllers;

use App\Penyebab;
use Illuminate\Http\Request;

class ProsesCF extends Controller
{

    public function index()
    {
        $penyebabs = Penyebab::orderBy('gejala')->get();
        return view('konseling', compact('penyebabs'));
    }

}
