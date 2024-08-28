<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DefaultUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => "admin@example.com",
            'password' => bcrypt("12345678"),
        ]);

        $adminRole = Role::whereName(\App\Enums\Role::ADMIN->value)->first();

        $admin->assignRole($adminRole);

        $manager = User::create([
            'name' => 'manager',
            'email' => "manager@example.com",
            'password' => bcrypt("12345678"),
        ]);

        $managerRole = Role::whereName(\App\Enums\Role::MANAGER->value)->first();

        $manager->assignRole($managerRole);

        $user = User::create([
            'name' => 'user',
            'email' => "user@example.com",
            'password' => bcrypt("12345678"),
        ]);

        $userRole = Role::whereName(\App\Enums\Role::USER->value)->first();

        $user->assignRole($userRole);

    }
}
