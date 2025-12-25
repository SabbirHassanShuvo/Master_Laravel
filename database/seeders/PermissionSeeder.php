<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Products
        Permission::firstOrCreate(['name' => 'products.view',   'guard_name' => 'web']);
        Permission::firstOrCreate(['name' => 'products.create', 'guard_name' => 'web']);
        Permission::firstOrCreate(['name' => 'products.edit',   'guard_name' => 'web']);
        Permission::firstOrCreate(['name' => 'products.delete', 'guard_name' => 'web']);

        // Users
        Permission::firstOrCreate(['name' => 'users.view',   'guard_name' => 'web']);
        Permission::firstOrCreate(['name' => 'users.create', 'guard_name' => 'web']);
        Permission::firstOrCreate(['name' => 'users.edit',   'guard_name' => 'web']);
        Permission::firstOrCreate(['name' => 'users.delete', 'guard_name' => 'web']);

        // Roles
        Permission::firstOrCreate(['name' => 'roles.view',   'guard_name' => 'web']);
        Permission::firstOrCreate(['name' => 'roles.create', 'guard_name' => 'web']);
        Permission::firstOrCreate(['name' => 'roles.edit',   'guard_name' => 'web']);
        Permission::firstOrCreate(['name' => 'roles.delete', 'guard_name' => 'web']);

        // FQA
        Permission::firstOrCreate(['name' => 'fqa.view',   'guard_name' => 'web']);
        Permission::firstOrCreate(['name' => 'fqa.create', 'guard_name' => 'web']);

        // Settings
        Permission::firstOrCreate(['name' => 'settings.manage', 'guard_name' => 'web']);
    }
}
