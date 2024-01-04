<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class tokoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('toko')->insert([
            'kode'=>'A01',
            'nama'=> 'Minyak',
            'jumlah'=> 100,
            'harga'=> 15000,
            'supplier'=>'Sumber Rejeki',
        ]);
    }
}
