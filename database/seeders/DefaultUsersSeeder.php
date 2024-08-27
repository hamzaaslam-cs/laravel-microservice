<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\Role as CustomRole;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

    }
}
