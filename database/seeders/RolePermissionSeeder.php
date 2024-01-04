<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name'=>'tambah-barang']);
        Permission::create(['name'=>'edit-barang']);
        Permission::create(['name'=>'hapus-barang']);
        Permission::create(['name'=>'tambah-supplier']);
        Permission::create(['name'=>'edit-supplier']);
        Permission::create(['name'=>'hapus-supplier']);
        Permission::create(['name'=>'tambah-customer']);
        Permission::create(['name'=>'edit-customer']);
        Permission::create(['name'=>'hapus-customer']);
        Permission::create(['name'=>'tambah-user']);
        
        Role::create(['name'=>'manager']);
        Role::create(['name'=>'staff']);

        $roleManager = Role::findByName('manager');
        $roleManager->givePermissionTo('tambah-barang');
        $roleManager->givePermissionTo('edit-barang');
        $roleManager->givePermissionTo('hapus-barang');
        $roleManager->givePermissionTo('tambah-supplier');
        $roleManager->givePermissionTo('edit-supplier');
        $roleManager->givePermissionTo('hapus-supplier');
        $roleManager->givePermissionTo('tambah-customer');
        $roleManager->givePermissionTo('edit-customer');
        $roleManager->givePermissionTo('hapus-customer');
        $roleManager->givePermissionTo('tambah-user');

        $roleStaff = Role::findByName('staff');
        $roleStaff->givePermissionTo('edit-barang');
    }
}
