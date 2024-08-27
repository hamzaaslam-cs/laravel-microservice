<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name' => \App\Enums\Role::ADMIN->value,
                'display_name' => Str::title(\App\Enums\Role::ADMIN->value),
                'guard_name' => '*'
            ],
            [
                'name' => \App\Enums\Role::MANAGER->value,
                'display_name' => Str::title(\App\Enums\Role::MANAGER->value),
                'guard_name' => '*'
            ],
            [
                'name' => \App\Enums\Role::USER->value,
                'display_name' => Str::title(\App\Enums\Role::USER->value),
                'guard_name' => '*'
            ],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }

    }
}
