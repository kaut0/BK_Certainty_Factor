<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HasilDiagnosa;

class HasilDiagnosaController extends Controller
{
    public function index(){
        $indexs = HasilDiagnosa::orderBy('created_at', 'desc')->simplePaginate(5);
        return view('Admin.Riwayat')->with('indexs', $indexs);
    }

    public function show($id){
        $show = HasilDiagnosa::find($id);
        return view('detail');
    }

    public function destroy($id){
        $delete = HasilDiagnosa::find($id);
        $delete->delete();
        return view('Admin.Riwayat')->with('success', 'data berhasil di hapus');;
    }
}