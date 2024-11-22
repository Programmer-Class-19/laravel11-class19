<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Gunakan firstOrCreate untuk menghindari duplikasi
        $createProductPermission = Permission::firstOrCreate(['name' => 'create-product']);
        $editProductPermission = Permission::firstOrCreate(['name' => 'edit-product']);
        $viewDashboardPermission = Permission::firstOrCreate(['name' => 'view-dashboard']);

        // Membuat role
        $adminRole = Role::create(['name' => 'admin']);
        $kasirRole = Role::create(['name' => 'kasir']);

        // Memberikan permission ke role
        $adminRole->givePermissionTo($createProductPermission);
        $adminRole->givePermissionTo($editProductPermission);
        $adminRole->givePermissionTo($viewDashboardPermission);

        $kasirRole->givePermissionTo($viewDashboardPermission);
    }



}
