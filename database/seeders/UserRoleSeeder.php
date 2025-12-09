<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::find(1);
        if($admin) $admin->assignRole('Admin');

        $manager = User::find(6);
        if($manager) $manager->assignRole('Manager');

        $user = User::find(8);
        if($user) $user->assignRole('User');
    }
}
