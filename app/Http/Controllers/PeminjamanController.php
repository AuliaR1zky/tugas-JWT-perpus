<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peminjaman_model;
use App\Buku;
use App\DetailPeminjaman_model;
use JWTAuth;
use DB;
use Auth;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;

class PeminjamanController extends Controller
{

  public function index(){
      $peminjaman=DB::table('peminjaman')
      ->join('anggota','anggota.id','=','peminjaman.id_anggota')
      ->join('petugas','petugas.id','=','peminjaman.id_petugas')
      ->select('peminjaman.id','peminjaman.id_anggota','anggota.nama_anggota','peminjaman.tanggal','peminjaman.tanggal_dl','peminjaman.denda')
      ->get();

      $data=array();
      foreach ($peminjaman as $dt_pj){
        $ok=DetailPeminjaman_model::where('id_pinjam',$dt_pj->id)->get();
        $arr_detail=array();
        foreach ($ok as $ok) {
          $arr_detail[]=array(
          'id_pinjam' =>$ok->id_pinjam,
          'id_buku' => $ok->id_buku,
          'jumlah' => $ok->jumlah
          );
        }

        $data[]=array(
          'id' => $dt_pj->id,
          'id_anggota' => $dt_pj->id_anggota,
          'nama_anggota' => $dt_pj->nama_anggota,
          'tanggal' => $dt_pj->tanggal,
          'tanggal_dl' => $dt_pj->tanggal_dl,
          'denda' => $dt_pj->denda,
          'detail_pinjam' => $arr_detail
        );
      }
      return response()->json(compact("data"));
    }
  


    public function store(Request $request){
      $validator=Validator::make($request->all(),
        [
          'id_anggota'=>'required',
          'id_petugas'=>'required',
          'tanggal'=>'required',
          'tanggal_dl'=>'required',
          'denda'=>'required'
        ]
      );

      if($validator->fails()){
        return Response()->json($validator->errors());
      }

      $simpan=Peminjaman_model::create([
        'id_anggota'=>$request->id_anggota,
        'id_petugas'=>$request->id_petugas,
        'tanggal'=>$request->tanggal,
        'tanggal_dl'=>$request->tanggal_dl,
        'denda'=>$request->denda
      ]);
      $status=1;
      $message="Peminjaman Berhasil Ditambahkan";
      if($simpan){
        return Response()->json(compact('status','message'));
      }else {
        return Response()->json(['status'=>0]);
      }
    }

    public function update($id,Request $request){
      $validator=Validator::make($request->all(),
        [
          'id_anggota'=>'required',
          'id_petugas'=>'required',
          'tanggal'=>'required',
          'tanggal_dl'=>'required',
          'denda'=>'required'
        ]
    );

    if($validator->fails()){
      return Response()->json($validator->errors());
    }

    $ubah=Peminjaman_model::where('id',$id)->update([
      'id_anggota'=>$request->id_anggota,
      'id_petugas'=>$request->id_petugas,
      'tanggal'=>$request->tanggal,
      'tanggal_dl'=>$request->tanggal_dl,
      'denda'=>$request->denda
    ]);
    $status=1;
    $message="Peminjaman Berhasil Diubah";
    if($ubah){
      return Response()->json(compact('status','message'));
    }else {
      return Response()->json(['status'=>0]);
    }
  }

  public function tampil_pinjam(){
    $data=DB::table('peminjaman')
    ->join('anggota','anggota.id','=','peminjaman.id_anggota')
    ->join('petugas','petugas.id','=','peminjaman.id_petugas')
    ->select('peminjaman.id','anggota.nama_anggota','anggota.alamat','anggota.telp','petugas.nama_petugas','peminjaman.tanggal','peminjaman.tanggal_dl','peminjaman.denda')
    ->get();
    $count=$data->count();
    $status=1;
    $message="Peminjaman Berhasil ditampilkan";
    return response()->json(compact('data','status','message','count'));
  }

  public function destroy($id){
    $hapus=Peminjaman_model::where('id',$id)->delete();
    $status=1;
    $message="Peminjaman Berhasil Dihapus";
    if($hapus){
      return Response()->json(compact('status','message'));
    }else {
      return Response()->json(['status'=>0]);
    }
  }






  //detail_pinjam

  public function simpan(Request $request){
    $validator=Validator::make($request->all(),
      [
        'id_pinjam'=>'required',
        'id_buku'=>'required',
        'jumlah'=>'required'
      ]
    );

    if($validator->fails()){
      return Response()->json($validator->errors());
    }

    $simpan=DetailPeminjaman_model::create([
      'id_pinjam'=>$request->id_pinjam,
      'id_buku'=>$request->id_buku,
      'jumlah'=>$request->jumlah
    ]);
    $status=1;
    $message="Detail Peminjaman Berhasil Ditambahkan";
    if($simpan){
      return Response()->json(compact('status','message'));
    }else {
      return Response()->json(['status'=>0]);
    }
  }


  public function ubah($id,Request $request){
    $validator=Validator::make($request->all(),
      [
        'id_pinjam'=>'required',
        'id_buku'=>'required',
        'jumlah'=>'required'
      ]
  );

  if($validator->fails()){
    return Response()->json($validator->errors());
  }

  $ubah=DetailPeminjaman_model::where('id',$id)->update([
    'id_pinjam'=>$request->id_pinjam,
    'id_buku'=>$request->id_buku,
    'jumlah'=>$request->jumlah
  ]);
  $status=1;
  $message="Detail Peminjaman Berhasil Diubah";
  if($ubah){
    return Response()->json(compact('status','message'));
  }else {
    return Response()->json(['status'=>0]);
  }
}


public function hapus($id){
  $hapus=DetailPeminjaman_model::where('id',$id)->delete();
  $status=1;
  $message="Detail Peminjaman Berhasil Dihapus";
  if($hapus){
    return Response()->json(compact('status','message'));
  }else {
    return Response()->json(['status'=>0]);
  }
}


  



}