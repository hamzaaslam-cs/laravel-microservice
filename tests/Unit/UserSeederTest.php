<?php

use App\Enums\Role;
use Database\Seeders\DefaultUsersSeeder;
use App\Models\User;
use Database\Seeders\RolesSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

// Using the `uses()` function to inherit from TestCase and include RefreshDatabase
uses(TestCase::class, RefreshDatabase::class);

it('should create 3 users', function () {
    // Act: Run the seeder
    $this->seed(RolesSeeder::class);
    $this->seed(DefaultUsersSeeder::class);

    // Assert: Check that 3 users were created
    expect(User::count())->toBe(3);

    $admin = User::whereEmail("admin@example.com")->first();
    $manager = User::whereEmail("manager@example.com")->first();
    $user = User::whereEmail("user@example.com")->first();

    expect($admin)->toBeInstanceOf(User::class)
        ->and($admin->hasRole(Role::ADMIN->value))->toBeTrue()
        ->and($admin->hasRole('user'))->toBeFalse()
        ->and($manager)->toBeInstanceOf(User::class)
        ->and($manager->hasRole(Role::MANAGER->value))->toBeTrue()
        ->and($manager->hasRole('user'))->toBeFalse()
        ->and($user)->toBeInstanceOf(User::class)
        ->and($user->hasRole(Role::USER->value))->toBeTrue()
        ->and($user->hasRole('admin'))->toBeFalse();
});
