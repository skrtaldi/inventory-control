<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class supplierSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('supplier')->insert([
            'kode'=>'SUPP001',
            'nama'=> 'Sumber Rejeki',
            'nomor'=> '0821234567',
            'alamat'=> 'Jl. Merapi 70',
        ]);
    }
}
