<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class kategoriSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kategori')->insert([
            'kode'=>'M1',
            'nama_kategori'=> 'Makanan',
        ]);

        DB::table('kategori')->insert([
            'kode'=>'M2',
            'nama_kategori'=> 'Minuman',
        ]);
    }
}
