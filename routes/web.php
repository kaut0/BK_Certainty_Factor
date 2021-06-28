<?php

error_reporting(E_ALL & ~E_NOTICE);

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('home');
});

Route::get('/Home', function () {
    return view('home');
});

Route::get('/register', function () {
    return view('auth/request');
});


Route::get('/LupaPassword', 'Auth\LoginController@lupaForm');
Route::get('/Konseling', 'ProsesCF@index');
Route::post('/Konseling', 'HitungCF@HitungCF')->name('ProsesKonseling');
Route::get('/daftarKeluhan', 'GejalaController@keluhan');


Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@Login')->name('Masuk');

Route::get('logOut', 'Auth\LoginController@LogOut')->name('LogOut');

Route::get('lupaForm', 'Auth\LoginController@lupaForm');
Route::post('lupaPassword', 'Auth\LoginController@cekEmail')->name('lupaPassword');

//resetPassword
Route::get('/reset-password/{token}', 'LoginController@getPassword')->name('reset');
Route::post('/reset-password-update', 'LoginController@resetPassword');

//auth
//yang membutuhkan middleware
Route::group(['middleware' => ['auth', 'CekLevel:admin']], function () {
    Route::get('/Admin', function () {
        return view('Admin/dashAdmin');
    });
    Route::get('TambahAnggota', 'Auth\LoginController@showRegisForm');
    Route::post('Regis', 'Auth\LoginController@Regis')->name('Regis');
    
    Route::delete('Hapus/{id}','Auth\LoginController@delete')->name('delete');
});

Route::group(['middleware' => ['auth', 'CekLevel:admin,guru']], function () {
    Route::get('/Admin', function () {
        return view('Admin/dashAdmin');
    });
    
    Route::get('/Keluhan', 'GejalaController@index');
    Route::get('/Penyebab', 'PenyebabController@index');
    Route::get('/Gejala', 'MasalahController@index');
    Route::get('/Histori', 'HasilDiagnosaController@index');

    Route::post('/masukData', 'GejalaController@store')->name('masukData');
    Route::post('/Penyebab/InputData', 'PenyebabController@store')->name('inputData');
    Route::post('/Gejala/InputData', 'MasalahController@store')->name('GejalaInsert');

    Route::patch('/masukData/{gejala}', 'GejalaController@update');
    Route::patch('/Penyebab/{penyebab}', 'PenyebabController@update');
    Route::patch('/Gejala/InputData/{masalah}', 'MasalahController@edit')->name('GejalaEdit');

    Route::delete('/hapusData/{gejala}', 'GejalaController@destroy');
    Route::delete('/hapusData/{penyebab}', 'PenyebabController@destroy')->name('hapusPenyebab');
    Route::delete('/Gejala/InputData/{masalah}', 'MasalahController@destroy')->name('GejalaHapus');
    Route::delete('/hapusRiwayat/{id}', 'HasilDiagnosaController@destroy')->name('hapusRiwayat');
});

