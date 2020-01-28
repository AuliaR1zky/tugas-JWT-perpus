<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggota_model extends Model
{
    protected $table="anggota";
    protected $primaryKey="id";

    public $fillable = [
            'nama_anggota', 'alamat', 'telp'
        ];
    
}
