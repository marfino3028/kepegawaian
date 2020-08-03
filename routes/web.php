<?php

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
    return view('welcome');
    //return view('layouts.welcome');
});

Route::resource('/home', 'HomeController')->middleware('auth');

Route::get('/login', function () {
    //return view('welcome');
    return view('auth.login');
})->middleware('auth');


Route::get('/register', function () {
    //return view('welcome');
    return view('auth.register');
});

Route::get('/about', function () {
    //return view('welcome');
    return view('layouts.about');
})->middleware('auth');



Route::get('/hello', function () {
    return view('salam');
});

Route::get('/kabar/{nama}', function ($nama) {
    return view('kabar',['nama' => $nama]);
});

Route::get('/kenalan/{nama}/{asal}', function ($nama,$asal) {
    return view('kenalan',['nama' => $nama, 'asal' => $asal]);
});

Route::get('/profesi/{nama}/{profesi}', function ($nama,$profesi) {
    return '<h2> Nama Saya '.$nama.' profesi saya '.$profesi.'</h2>';
});

Route::get('/nilai', function () {
    return view('nilai');
});

Route::get('/santri', 'SantriController@dataSantri');

//route untuk aplikasi
Route::resource('/kategori', 'KategoriController')->middleware('auth');

Route::resource('/jabatan', 'JabatanController')->middleware('auth');

Route::resource('/divisi', 'DivisiController')->middleware('auth');

Route::resource('/pegawai', 'PegawaiController')->middleware('auth');

Route::resource('/gaji', 'GajiController')->middleware('auth');

Route::resource('/materi', 'MateriController')->middleware('auth');

Route::resource('/pelatihan', 'PelatihanController');

Route::resource('/user', 'UserController')->middleware('auth');

Route::resource('/profile', 'ProfileController')->middleware('auth');


Route::get('generate-pdf', 'PegawaiController@generatePDF')->middleware('auth');
Route::get('pegawai-pdf', 'PegawaiController@pegawaiPDF')->middleware('auth');
Route::get('export', 'PegawaiController@export')->name('export')->middleware('auth');
Route::get('callApiPegawai', 'PegawaiController@callApiPegawai');
Route::get('pelatihan-pdf', 'PelatihanController@pelatihanPDF')->middleware('auth');

Route::get('jabatan-pdf', 'JabatanController@jabatanPDF')->middleware('auth');



Route::get('/afterRegister', function () {
    return view('layouts.afterRegister');
});


Route::get('/clear-cache', function(){
    Artisan::call('cache:clear');
    return "Cache is cleared";
});
Auth::routes();

