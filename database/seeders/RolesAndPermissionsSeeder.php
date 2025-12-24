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
        // roles created in RoleSeeder with ids 1,2,3
        $admin = Role::find(1); // Admin
        $agent = Role::find(2); // Agent
        $user  = Role::find(3); // User

        // 1. Admin: all permissions used in the project
        if ($admin) {
            $admin->syncPermissions(Permission::all());
        }

        // 2. Agent: can manage products & FAQs, view users, no role/setting management
        if ($agent) {
            $agent->syncPermissions([
                // 'products.view',
                'products.create',
                'products.edit',
                'products.delete',

                'users.view',

                'fqa.view',
                'fqa.create',
            ]);
        }

        // 3. User: read‑only access (can see products and FAQs only)
        if ($user) {
            $user->syncPermissions([
                'products.view',
                'fqa.view',
            ]);
        }
    }
}
