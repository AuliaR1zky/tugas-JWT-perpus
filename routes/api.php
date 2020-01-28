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

Route::get('/', function(){
    return Auth::user()->level;
})->middleware('jwt.verify');