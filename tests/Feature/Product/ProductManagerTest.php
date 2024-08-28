<?php

use App\Enums\Role;
use App\Models\User;
use Database\Seeders\DefaultUsersSeeder;
use Database\Seeders\PermissionSeeder;
use Database\Seeders\ProductsSeeder;
use Database\Seeders\RolesSeeder;

test('crud operations on products manager', function () {

    $this->seed(RolesSeeder::class);
    $this->seed(PermissionSeeder::class);
    $this->seed(DefaultUsersSeeder::class);
    $this->seed(ProductsSeeder::class);

    $managerRole = User::role(Role::MANAGER->value)->first();

    // Act: Log in the user using the 'api' guard

    ($this->actingAs($managerRole, 'api')->get('/products'))->assertStatus(200);
    ($this->actingAs($managerRole, 'api')->post('/products', [
        'name' => 'product test 2',
        'quantity' => 1,
        'price' => 10,
        'status' => 1,
    ]))->assertStatus(200);
    ($this->actingAs($managerRole, 'api')->put('/products/1', [
        'status' => 1,
    ]))->assertStatus(200);

    ($this->actingAs($managerRole, 'api')->get('/products/1'))->assertStatus(200);
    ($this->actingAs($managerRole, 'api')->delete('/products/1'))->assertStatus(403);

});
