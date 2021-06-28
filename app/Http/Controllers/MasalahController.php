<?php

namespace App\Http\Controllers;

use App\Masalah;
use Illuminate\Http\Request;

class MasalahController extends Controller
{
    public function index()
    {

        $masalahs = Masalah::simplePaginate(3);
        return view('Admin.masalah', compact('masalahs'));
    }

    public function store(Masalah $masalah, Request $request)
    {

        $request->validate([
            'nama_gejala' => 'required|String|min: 5|max: 255',
        ]);

        $masalah = new Masalah([
            "penyebab" => $request->nama_gejala,
        ]
        );

        $masalah->save();

        return redirect('/Gejala')->with('success', 'data berhasil di simpan');
    }

    public function edit(Masalah $masalah, Request $request)
    {
        $request->validate([
            'nama_gejala' => 'required|String|min: 5|max: 255',
        ]);

        $masalah->update([
            "penyebab" => $request->nama_gejala,
        ]
        );

        return redirect('/Gejala')->with('success', 'data berhasil di simpan');
    }

    public function destroy($masalah)
    {

        $delete = Masalah::find($masalah);
        $delete->delete();

        return redirect('/Gejala')->with('delete', 'data berhasil di hapus');
    }
}
