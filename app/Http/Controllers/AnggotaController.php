<?php

namespace App\Http\Controllers;

use App\Anggota_model;
use JWTAuth;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AnggotaController extends Controller
{
    public function store(Request $req)
    {
        $validator=Validator::make($req->all(),
        [
            'nama_anggota'=>'required',
            'alamat'=>'required',
            'telp'=>'required'
        ]
        );
        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $simpan=Anggota_model::create([
            'nama_anggota'=>$req->nama_anggota,
            'alamat'=>$req->alamat,
            'telp'=>$req->telp
        ]);
        if($simpan){
            return Response()->json(['status'=>1]);
        } else {
            return Response()->json(['status'=>0]);
        }
    }

    public function update($id, Request $req)
    {
        $validator=Validator::make($req->all(),
        [
            'nama_anggota'=>'required',
            'alamat'=>'required',
            'telp'=>'required'
        ]
        );
        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $ubah=Anggota_model::where('id', $id)->update([
            'nama_anggota'=>$req->nama_anggota,
            'alamat'=>$req->alamat,
            'telp'=>$req->telp
        ]);
        if($ubah){
            return Response()->json(['status'=>1]);
        } else {
            return Response()->json(['status'=>0]);
        }
    }

    public function hapus($id){
        $hapus=Anggota_model::where('id', $id)->delete();
        if($hapus){
            return Response()->json(['status'=>1]);
        } else {
            return Response()->json(['status'=>0]);
        }
    }
    public function tampil(){
        $data_anggota = Anggota_model::get();
        $count = $data_anggota->count();
        $arr_data = array();
        foreach ($data_anggota as $dt_ang){
          $arr_data[] = array(
            'id' => $dt_ang->id,
            'nama_anggota' => $dt_ang->nama_anggota,
            'alamat' => $dt_ang->alamat,
            'telp' => $dt_ang->telp,
          );
        }
        $status=1;
        return Response()->json(compact('count','count', 'arr_data'));

}
}