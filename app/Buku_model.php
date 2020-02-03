<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku_model extends Model
{
    protected $table='buku';
    protected $primaryKey='id';

    protected $fillable = [
        'judul', 'penerbit', 'pengarang', 'foto'
    ];

    public function detail_peminjaman(){
        return this()->hasMany('App\detail_peminjaman', 'id');
    }
}
