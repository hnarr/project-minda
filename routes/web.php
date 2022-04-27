<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/login', function () {
    return view('login');
});
Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin', function () {
    return view('admin');
});
Route::get('/beranda', function () {
    return view('admin.adminberanda');
});
Route::get('/permintaan', function () {
    return view('admin.datapermintaan');
});
Route::get('/prediksi', function () {
    return view('admin.dataprediksi');
});
Route::get('/prosesprediksi', function () {
    return view('admin.prosesprediksi');
});
Route::get('/pengguna', function () {
    return view('admin.datapengguna');
});
Route::get('/beranda', function () {
    return view('pengguna.penggunaberanda');
});
Route::get('/permintaanpengguna', function () {
    return view('pengguna.datapermintaan');
});


// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/login', 'LoginController@index');

//ADMIN
Route::get('/admin', 'AdminController@admin_beranda')->name('admin');

Route::get('/pengguna', 'UserController@index');
Route::post('/pengguna/tambah','UserController@tambah')->name('tambah');
Route::get('/pengguna/edit/{id}','UserController@edit')->name('edit');
Route::post('/pengguna/update','UserController@update')->name('update');
Route::get('/pengguna/hapus{id}','UserController@hapus')->name('hapus');

Route::get('/permintaan', 'PermintaanController@index');
Route::post('/permintaan/tambah','PermintaanController@tambah')->name('tambah');
Route::get('/permintaan/edit/{id}','PermintaanController@edit')->name('edit');
Route::post('/permintaan/update','PermintaanController@update')->name('update');
Route::get('/permintaan/hapus{id}','PermintaanController@hapus')->name('hapus');

Route::get('/jenisdarah', 'DataDarahController@index');
Route::post('/jenisdarah/tambah','DataDarahController@tambah')->name('tambah');
Route::get('/jenisdarah/edit/{id}','DataDarahController@edit')->name('edit');
Route::post('/jenisdarah/update','DataDarahController@update')->name('update');
Route::get('/jenisdarah/hapus{id}','DataDarahController@hapus')->name('hapus');

Route::get('/prediksi', 'DataPrediksiController@index')->name('data-prediksi');
Route::get('/prediksi/hapus{id}','DataPrediksiController@hapus')->name('hapus');
// Route::get('/hasilprediksi', 'DataPrediksiController@index');

Route::get('/prosesprediksi', 'ProsesPrediksiController@index');
Route::post('/prediksipermintaan', 'ProsesPrediksiController@prediksi')->name('prediksi-permintaan');
Route::post('/simpanprediksi', 'ProsesPrediksiController@simpan')->name('simpan-hasil');


//USER
Route::get('/user', 'PenggunaController@pengguna_beranda')->name('user');

Route::get('/jenisdarahpengguna', 'DataDarahPenggunaController@index');
Route::post('/jenisdarahpengguna/tambah','DataDarahPenggunaController@tambah')->name('tambah');
Route::get('/jenisdarahpengguna/edit/{id}','DataDarahPenggunaController@edit')->name('edit');
Route::post('/jenisdarahpengguna/update','DataDarahPenggunaController@update')->name('update');
Route::get('/jenisdarahpengguna/hapus{id}','DataDarahPenggunaController@hapus')->name('hapus');

Route::get('/permintaanpengguna', 'PermintaanPenggunaController@index');
Route::post('/permintaanpengguna/tambah','PermintaanPenggunaController@tambah')->name('tambah');
Route::get('/permintaanpengguna/edit/{id}','PermintaanPenggunaController@edit')->name('edit');
Route::post('/permintaanpengguna/update','PermintaanPenggunaController@update')->name('update');
Route::get('/permintaanpengguna/hapus{id}','PermintaanPenggunaController@hapus')->name('hapus');

Route::get('/prediksipengguna', 'DataPrediksiPenggunaController@index')->name('data-prediksi');
Route::get('/prediksipengguna/hapus{id}','DataPrediksiPenggunaController@hapus')->name('hapus');
