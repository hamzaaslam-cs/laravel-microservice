<?php


use App\Models\Role;
use Database\Seeders\DefaultUsersSeeder;

use Database\Seeders\RolesSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

// Using the `uses()` function to inherit from TestCase and include RefreshDatabase
uses(TestCase::class, RefreshDatabase::class);

it('should create 3 roles', function () {
    // Act: Run the seeder
    $this->seed(RolesSeeder::class);

    // Assert: Check that 3 users were created
    expect(Role::count())->toBe(3)
        ->and(Role::whereName(\App\Enums\Role::ADMIN->value)->first())->toBeInstanceOf(Role::class)
        ->and(Role::whereName(\App\Enums\Role::MANAGER->value)->first())->toBeInstanceOf(Role::class)
        ->and(Role::whereName(\App\Enums\Role::USER->value)->first())->toBeInstanceOf(Role::class);
});
