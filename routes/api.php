<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', 'PetugasController@register');
Route::post('login', 'PetugasController@login');

//buku
Route::post('/simpan_buku','BukuController@store');
Route::put('/ubah_buku/{id}','BukuController@update');
Route::delete('/hapus_buku/{id}','BukuController@hapus');
Route::get('/tampil_buku','BukuController@tampil');

//anggota
Route::post('/simpan_anggota','AnggotaController@store');
Route::put('/ubah_anggota/{id}','AnggotaController@update');
Route::delete('/hapus_anggota/{id}','AnggotaController@hapus');
Route::get('/tampil_anggota','AnggotaController@tampil');

//Peminjaman
Route::post('/simpan_peminjaman','PeminjamanController@store');
Route::put('/ubah_peminjaman/{id}','PeminjamanController@update');
Route::delete('/hapus_peminjaman/{id}','PeminjamanController@destroy');
Route::get('/tampil_peminjaman','PeminjamanController@tampil_pinjam');
Route::get('/peminjaman','PeminjamanController@index');

//DetailPeminjaman
Route::post('/simpan_detail','PeminjamanController@simpan');
Route::put('/ubah_detail/{id}','PeminjamanController@ubah');
Route::delete('/hapus_detail/{id}','PeminjamanController@hapus');

Route::get('/', function(){
    return Auth::user()->level;
})->middleware('jwt.verify');