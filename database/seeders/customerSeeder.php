<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class customerSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('customer')->insert([
            'kode'=>'CUST001',
            'nama'=> 'Ardi',
            'nomor'=> '08212345678',
            'alamat'=> 'Jl. Gandrung 69',
        ]);
    }
}
