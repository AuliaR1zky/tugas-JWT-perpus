<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PeminjamanController extends Controller
{
    public function store(Request $req)
    {
        $validator=Validator::make($req->all(),
        [
            'tanggal'=>'required',
            'id_anggota'=>'required',
            'id_petugas'=>'required',
            'tanggal_dl'=>'required',
            'denda'=>'required'
        ]
        );
        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $simpan=Peminjaman_model::create([
            'tanggal'=>$req->tanggal,
            'id_anggota'=>$req->id_anggota,
            'id_petugas'=>$req->id_petugas,
            'denda'=>$req->denda
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
}
