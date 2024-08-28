<?php

use App\Enums\Role;
use App\Models\User;
use Database\Seeders\PermissionSeeder;
use Database\Seeders\RolesSeeder;

test('crud operations on users by admin', function () {

    $this->seed(RolesSeeder::class);
    $this->seed(PermissionSeeder::class);

    // Act: Log in the user using the 'api' guard

    ($this->post('api/auth/register', [
        "email" => "test1@example.com",
        "password" => "12345678",
        "password_confirmation" => "12345678",
        "name" => "Hamza"
    ]))->assertStatus(200);

    ($this->post('api/auth/login', [
        "email" => "test1@example.com",
        "password" => "12345678",
    ]))->assertStatus(200);

    $user = User::where('email', 'test1@example.com')->first();

    ($this->actingAs($user, 'api')->post('api/auth/refresh', [
    ]))->assertStatus(200);

    ($this->actingAs($user, 'api')->post('api/auth/logout', [
    ]))->assertStatus(200);

    ($this->actingAs($user, 'api')->post('api/auth/refresh', [
    ]))->assertStatus(500);


});


