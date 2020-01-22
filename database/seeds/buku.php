<?php

use Illuminate\Database\Seeder;

class buku extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Buku_model::insert([
            [
                'judul' => 'Laskar pelangi',
                'penerbit' => 'Gramedia',
                'pengarang' => 'Niansa',
                'foto' => '-',
                'created_at' => Date('Y-m-d H:i:s')
            ],
            [
                'judul' => 'Dilan 1990',
                'penerbit' => 'Gramedia',
                'pengarang' => 'Aulia',
                'foto' => '-',
                'created_at' => Date('Y-m-d H:i:s')
            ],
            [
                'judul' => 'Harry Potter',
                'penerbit' => 'Gramedia',
                'pengarang' => 'Della',
                'foto' => '-',
                'created_at' => Date('Y-m-d H:i:s')
            ],
            [
                'judul' => 'Detektif Conan',
                'penerbit' => 'Gramedia',
                'pengarang' => 'Heni',
                'foto' => '-',
                'created_at' => Date('Y-m-d H:i:s')
            ],
            [
                'judul' => 'Hujan',
                'penerbit' => 'Tere Liye',
                'pengarang' => 'Kandiya',
                'foto' => '-',
                'created_at' => Date('Y-m-d H:i:s')
            ],
        ]);
    }
}
