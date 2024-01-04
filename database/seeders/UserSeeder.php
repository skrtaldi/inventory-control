<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $manager = User::create([
            'name' => 'manager',
            'email' => 'ardi320042004@gmail.com',
            'password' => bcrypt('ardi32004'),
        ]);
        $manager->assignRole('manager');

        $staff= User::create([
            'name' => 'staff',
            'email' => 'ardi32004@gmail.com',
            'password' => bcrypt('ardi2004'),
        ]);
        $staff->assignRole('staff');
        
    }
}
