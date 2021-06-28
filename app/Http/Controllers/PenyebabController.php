<?php

namespace App\Http\Controllers;

use App\Gejala;
use App\penyebab;
use App\Masalah;
use Illuminate\Http\Request;

class PenyebabController extends Controller
{
    public function index()
    {
        //$penyebabs = Penyebab::all();
        $penyebabs = Penyebab::with('gejala','masalah')->simplePaginate(3);
        $gejalas = Gejala::all();
        $masalahs = Masalah::all();
        //dd($penyebabs);
        // return $penyebab;
        return view('Admin.penyebab', compact('penyebabs', 'gejalas', 'masalahs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'penyebab' => 'required',
            'permasalahan' => 'required',
            'cf' => 'required|nullable',
        ]);

        $penyebab = new Penyebab([
            'penyebab' => $request->penyebab,
            'gejala' => $request->permasalahan,
            'cf' => $request->cf,
        ]);

        $penyebab->save();

        return redirect('/Penyebab')->with('success', 'data berhasil di simpan');
    }

    public function update(Request $request, Penyebab $penyebab)
    {
        $request->validate([
            'penyebab' => 'required',
            'permasalahan' => 'required',
            'cf' => 'required|nullable',
        ]);

        $penyebab->update([
            'penyebab' => $request->penyebab,
            'gejala' => $request->permasalahan,
            'cf'=> $request->cf,
        ]);

        return redirect('/Penyebab')->with('success', 'Berhasil Di Ubah');

    }

    public function destroy(Penyebab $penyebab)
    {
        $penyebab->destroy();
        return redirect('/Penyebab')->with('success', 'data berhasil di hapus');
    }
}
