<?php

use Illuminate\Database\Seeder;

class anggota extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \App\Anggota_model::insert([
          [
          'nama_anggota' => 'Jinjin',
          'alamat' => 'Malang',
          'telp' => '0812345679',
          'created_at' => Date('Y-m-d H:i:s')

      ],
      [
        'nama_anggota' => 'Aulia',
        'alamat' => 'Malang',
        'telp' => '0278671312',
        'created_at' => Date('Y-m-d H:i:s')
      ],
      [
          'nama_anggota' => 'Rizky',
          'alamat' => 'Lamongan',
          'telp' => '98777371931',
          'created_at' => Date('Y-m-d H:i:s')
      ],
      [
        'nama_anggota' => 'Eunwoo',
        'alamat' => 'Seoul',
        'telp' => '9831973191',
        'created_at' => Date('Y-m-d H:i:s')
      ],
      [
        'nama_anggota' => 'Sowon',
        'alamat' => 'Jeju',
        'telp' => '123456789',
        'created_at' => Date('Y-m-d H:i:s')
      ]
      
      ]);
      
    }
}
