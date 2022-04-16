<?php

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




// Route::get('/home', 'HomeController@index')->name('home');
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

Route::get('/prediksi', 'DataPrediksiController@index');
Route::get('/prediksi/hapus{id}','DataPrediksiController@hapus')->name('hapus');