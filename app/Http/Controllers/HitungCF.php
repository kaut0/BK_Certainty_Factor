<?php

namespace App\Http\Controllers;

use App\Gejala;
use App\penyebab;
use App\HasilDiagnosa;
use Illuminate\Http\Request;

class HitungCF extends Controller
{
    public function HitungCF(Request $request)
    {
        $request->validate([
            'nama' => 'required|String',
            'kelas' => 'required|String'
        ]);


        $data = $request->Penyebab;
        $input = array_filter($request->inputUser);

        $posts = array();
        $arrayIndex = array_map('floatval', $input);
        $Input_User = array_values($arrayIndex);

        $cfInput = array();

        $cf = array();
        $cfHasil = array();

        $masalah = array();
        $gejala = array();
        $Solusi = array();

        $hasil_combine = [];
        $hasil_hitung = array();

        for ($i = 0; $i < count($data); $i++) {

            $post = Penyebab::with('gejala')->where('kode_penyebab', $data[$i])->groupBy('gejala')->get();
            $postUser = $Input_User;

            array_push($cfInput, $postUser);
            array_push($posts, $post);
        }

        for ($i = 0; $i < count($posts); $i++) {
            $posted = $posts[$i];
            $cf_user = $cfInput[$i];

            for ($j = 0; $j < count($posted); $j++) {
                foreach ($posted as $value) {
                    $id_penyebab = $value->kode_penyebab;
                    $kode_gejala = $value->gejala;
                    $nama_gejala = $value->Gejala->nama_gejala;
                    $solusi = $value->Gejala->solusi;
                    $permasalahan = $value->penyebab;

                    $cf_case = $value->cf * $cf_user[$i];
                    

                    array_push($cf, $cf_case);
                    array_push($gejala, $nama_gejala);
                    array_push($Solusi, $solusi);
                    array_push($masalah, $permasalahan);
                    break;

                }
            }
            
            $hasilcombin = 0;
            for ($z = 0; $z < count($cf); $z++) {
                echo $hasilcombin;
                if ($gejala[$i] == $gejala[$i - 1]) {
                    if ($z == 0) {
                        $hasilcombin = $cf[$z] + ($cf[$z + 1] * (1.0 - $cf[$z]));
                        if (count($cf)-1 == 1) {
                            $hasil_combine[$i]['gejala'] = $gejala[$i];
                            $hasil_combine[$i]['solusi'] = $Solusi[$i];
                            $hasil_combine[$i]['hitung'] = $hasilcombin;
                            break;
                        } else {
                            if ($z + 1 == count($cf)) {
                                $hasil_combine[$i]['gejala'] = $gejala[$i];
                                $hasil_combine[$i]['solusi'] = $Solusi[$i];
                                $hasil_combine[$i]['hitung'] = $hasilcombin;
                                break;
                            }
                            $hasilcombin = $hasilcombin + $cf[$i] * (1.0 - $hasilcombin);
                            // $hasilcombin = $hasilcombin + ($cf[$z] * (1.0 - $hasilcombin));
                            $hasil_combine[$i]['gejala'] = $gejala[$i];
                            $hasil_combine[$i]['solusi'] = $Solusi[$i];
                            $hasil_combine[$i]['hitung'] = $hasilcombin;
                        }
                        
                    }
                } else {
                    $hasilcombin = $cf[$i];
                    $hasil_combine[$i]['gejala'] = $gejala[$i];
                    $hasil_combine[$i]['solusi'] = $Solusi[$i];
                    $hasil_combine[$i]['hitung'] = $hasilcombin;
                }

            }
        }

        $tmp = 0;
        for ($i = 0; $i < count($hasil_combine); $i++) {
            if ($tmp < $hasil_combine[$i]['hitung']) {
                $obj = (object) [
                    'Permasalahan' => $hasil_combine[$i]['gejala'],
                    'Solusi' => $hasil_combine[$i]['solusi'],
                    'Hitung' => $hasil_combine[$i]['hitung'],
                ];

                $histori_permasalahan = $hasil_combine[$i]['gejala'];
                // $histori_Solusi = $hasil_combine[$i]['solusi'];
                


                $tmp = $hasil_combine[$i]['hitung'];
            }

        }

        $hasil = (object) [
            "list_case" => $hasil_combine,
            "hasil_pakar" => $obj,
        ];

        //masukkan ke dalam database

        $post = new HasilDiagnosa([
            'nama'=>$request->nama,
            'kelas'=>$request->kelas,
            'permasalahan'=>$histori_permasalahan
        ]);

        // $post->save();
        dd($hasil_combine);
       
        // return view('hasil')->with('hasil', $hasil);

    }
}
