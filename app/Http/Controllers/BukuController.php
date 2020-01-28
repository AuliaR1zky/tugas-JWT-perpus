<?php

namespace App\Http\Controllers;

use App\Buku_model;
use JWTAuth;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class BukuController extends Controller
{
    public function store(Request $req)
    {
        $validator=Validator::make($req->all(),
        [
            'judul'=>'required',
            'penerbit'=>'required',
            'pengarang'=>'required',
            'foto'=>'required'
        ]
        );
        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $simpan=Buku_model::create([
            'judul'=>$req->judul,
            'penerbit'=>$req->penerbit,
            'pengarang'=>$req->pengarang,
            'foto'=>$req->foto
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
            'judul'=>'required',
            'penerbit'=>'required',
            'pengarang'=>'required',
            'foto'=>'required'
        ]
        );
        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $ubah=Buku_model::where('id', $id)->update([
            'judul'=>$req->judul,
            'penerbit'=>$req->penerbit,
            'pengarang'=>$req->pengarang,
            'foto'=>$req->foto
        ]);
        if($ubah){
            return Response()->json(['status'=>1]);
        } else {
            return Response()->json(['status'=>0]);
        }
    }

    public function hapus($id){
        $hapus=Buku_model::where('id', $id)->delete();
        if($hapus){
            return Response()->json(['status'=>1]);
        } else {
            return Response()->json(['status'=>0]);
        }
    }
    public function tampil(){
      $data_buku = Buku_model::get();
      $count = $data_buku->count();
      $arr_data = array();
      foreach ($data_buku as $dt_buku){
        $arr_data[] = array(
          'id' => $dt_buku->id,
          'judul' => $dt_buku->judul,
          'penerbit' => $dt_buku->penerbit,
          'pengarang' => $dt_buku->pengarang,
          'foto' => $dt_buku->foto,
        );
      }
      $status=1;
      return Response()->json(compact('count','count', 'arr_data'));

}
}

