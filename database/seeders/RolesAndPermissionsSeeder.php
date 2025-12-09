<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Roles
        $admin = Role::firstOrCreate(['name' => 'Admin']);
        $manager = Role::firstOrCreate(['name' => 'Manager']);
        $user = Role::firstOrCreate(['name' => 'User']);

        // Create Permissions
        $permissions = [
            'create-product', 'edit-product', 'delete-product', 'view-product',
            'create-user', 'edit-user', 'delete-user', 'view-user'
        ];

        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm]);
        }

        // Assign Permissions to Roles
        $admin->givePermissionTo(Permission::all()); // Admin gets everything
        $manager->givePermissionTo(['create-product','edit-product','view-product','view-user']);
        $user->givePermissionTo(['view-product']);
    }
}
