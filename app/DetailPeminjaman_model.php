<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPeminjaman_model extends Model
{
    protected $table='detailpeminjaman';
    protected $primaryKey='id';

    protected $fillable = [
        'id_pinjam', 'id_buku', 'jumlah'
    ];

    public function buku(){
        return this()->belongsTo('App\Buku', 'id_buku');
    }
}
