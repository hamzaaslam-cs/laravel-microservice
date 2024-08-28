<?php

use App\Enums\Role;
use App\Models\User;
use Database\Seeders\DefaultUsersSeeder;
use Database\Seeders\PermissionSeeder;
use Database\Seeders\ProductsSeeder;
use Database\Seeders\RolesSeeder;

test('crud operations on order by manager', function () {

    $this->seed(RolesSeeder::class);
    $this->seed(PermissionSeeder::class);
    $this->seed(DefaultUsersSeeder::class);
    $this->seed(ProductsSeeder::class);

    $managerRole = User::role(Role::MANAGER->value)->first();

    // Act: Log in the user using the 'api' guard

    ($this->actingAs($managerRole, 'api')->post('/api/orders', [
        'user_id' => 3,
        'product_id' => 1,
        "quantity" => 2,
        "total_cost" => 100
    ]))->assertStatus(200);
    ($this->actingAs($managerRole, 'api')->get('/api/products'))->assertStatus(200);
    ($this->actingAs($managerRole, 'api')->put('/api/orders/1', [
        'status' => 1,
    ]))->assertStatus(200);
    ($this->actingAs($managerRole, 'api')->get('/api/orders/1'))->assertStatus(200);
    ($this->actingAs($managerRole, 'api')->delete('/api/orders/1'))->assertStatus(200);

});


