<?php

use Illuminate\Database\Seeder;

class petugas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Petugas_model::insert([
            [
                'nama_petugas' => 'Dewi',
                'alamat' => 'Sawojajar',
                'telp' => '123456789',
                'username' => 'Dewii',
                'password' => 'Dewi123',
                'created_at' => Date('Y-m-d H:i:s')
            ],
            [
                'nama_petugas' => 'Cika',
                'alamat' => 'Malang',
                'telp' => '456776543',
                'username' => 'Cikaa',
                'password' => 'Cika123',
                'created_at' => Date('Y-m-d H:i:s')
            ],
            [
                'nama_petugas' => 'Malika',
                'alamat' => 'Tulungagung',
                'telp' => '0987654321',
                'username' => 'Malikaa',
                'password' => 'Malika123',
                'created_at' => Date('Y-m-d H:i:s')
            ],
            [
                'nama_petugas' => 'Angel',
                'alamat' => 'Danau Ranau',
                'telp' => '073618341',
                'username' => 'Angell',
                'password' => 'Angel123',
                'created_at' => Date('Y-m-d H:i:s')
            ],
            [
                'nama_petugas' => 'Sania',
                'alamat' => 'Malang',
                'telp' => '45677432',
                'username' => 'Saniaa',
                'password' => 'Sania123',
                'created_at' => Date('Y-m-d H:i:s')
            ]
            ]);


    }
}
