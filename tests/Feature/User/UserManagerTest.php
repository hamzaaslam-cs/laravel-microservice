<?php

use App\Enums\Role;
use App\Models\Product;
use App\Models\User;
use Database\Seeders\DefaultUsersSeeder;
use Database\Seeders\PermissionSeeder;
use Database\Seeders\ProductsSeeder;
use Database\Seeders\RolesSeeder;

test('crud operations on users by admin', function () {

    $this->seed(RolesSeeder::class);
    $this->seed(PermissionSeeder::class);
    $this->seed(DefaultUsersSeeder::class);


    $managerRole = User::role(Role::MANAGER->value)->first();

    // Act: Log in the user using the 'api' guard

    ($this->actingAs($managerRole, 'api')->post('api/users', [
        'name' =>"test",
        'email' => "test1@example.com",
        'role' => Role::ADMIN->value,
    ]))->assertStatus(302);

    ($this->actingAs($managerRole, 'api')->post('api/users', [
        'name' =>"test",
        'email' => "testmanager1@example.com",
        'role' => Role::MANAGER->value,
    ]))->assertStatus(403);

    ($this->actingAs($managerRole, 'api')->post('api/users', [
        'name' =>"test",
        'email' => "testuser1@example.com",
        'role' => Role::USER->value,
    ]))->assertStatus(200);

    // Fetch the newly created user
    $newUser = User::where('email', 'testuser1@example.com')->firstOrFail();

    // Assert: Verify that the new user has the 'user' role
    expect($newUser->hasRole(Role::USER->value))->toBeTrue()
        ->and($newUser->hasRole(Role::ADMIN->value))->toBeFalse();


    ($this->actingAs($managerRole, 'api')->get('/api/users'))->assertStatus(200);
    ($this->actingAs($managerRole, 'api')->put('/api/users/1', [
        'status' => 1,
    ]))->assertStatus(200);
    ($this->actingAs($managerRole, 'api')->get('/api/users/1'))->assertStatus(200);
    ($this->actingAs($managerRole, 'api')->delete('/api/users/1'))->assertStatus(200);

});


