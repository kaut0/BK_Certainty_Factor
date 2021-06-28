<?php

namespace App\Http\Controllers;

use App\Gejala;
use Illuminate\Http\Request;
//use DB;


class GejalaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        
        $gejala = Gejala::simplePaginate(3);
        return view('Admin.Keluhan')->with('gejalas', $gejala);
        //return view('index', compact('gejala'));
    }
    

    public function keluhan(){

        $keluhan = Gejala::simplePaginate(10);
        return view('daftarKeluhan')->with('gejalas', $keluhan);

    }

    public function store(Request $request)
    {
        // 
        
        $request->validate([
            'nama_gejala' => 'required|String|min: 5|max: 255',
            'solusi' => 'required|String|min: 5'
        ]);

        // $input = Validator::make(Input::all(), $validasi);

        //proses simpan
        $gejala = new Gejala([
            'nama_gejala' => $request->nama_gejala,
            'solusi' => $request->solusi
        ]);

        $gejala->save();
        return redirect('/Keluhan')->with('success', 'data berhasil di simpan');
        // return json_encode(array(
        //     "status" => 200
        // ));
        // Gejala::create($request->all());
        
    }

    public function update(Request $request, Gejala $gejala)
    {
        // $request->validate([
        //     'nama_gejala' => 'required|String|min: 5|max: 255',
        //     'solusi' => 'required|String|min: 5|max: 255'
        // ]);

        $this->validate($request,[
            'nama_gejala' => 'required|String|min: 5|max: 255',
            'solusi' => 'required|String|min: 5' 
        ]);

        // $gejala = Gejala::find($gejala);
        // $gejala->nama_gejala = $request->nama_gejala;
        // $gejala->solusi = $request->solusi;
        // $gejala->save();
            
        $gejala->update([
            'nama_gejala'=> $request->nama_gejala,
            'solusi'=> $request->solusi
        ]);

        
        return redirect('Keluhan')->with('success', 'Berhasil Di Ubah');
        // return view('Admin.Keluhan')->with('succes', 'Data has been successfully sent!');
    }
    public function destroy(Gejala $gejala)
    {   
        $gejala->delete();
        return redirect()->action('GejalaController@index')->with('delete', 'Berhasil Di Hapus');
    }

}
