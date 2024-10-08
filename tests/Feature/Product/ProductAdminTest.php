<?php

use App\Enums\Role;
use App\Models\Product;
use App\Models\User;
use Database\Seeders\DefaultUsersSeeder;
use Database\Seeders\PermissionSeeder;
use Database\Seeders\ProductsSeeder;
use Database\Seeders\RolesSeeder;

test('crud operations on products by admin', function () {

    $this->seed(RolesSeeder::class);
    $this->seed(PermissionSeeder::class);
    $this->seed(DefaultUsersSeeder::class);
    $this->seed(ProductsSeeder::class);

    $adminRole = User::role(Role::ADMIN->value)->first();

    // Act: Log in the user using the 'api' guard


    ($this->actingAs($adminRole, 'api')->get('/products'))->assertStatus(200);
    ($this->actingAs($adminRole, 'api')->post('/products', [
        'name' => 'product test',
        'quantity' => 1,
        'price' => 10,
        'status' => 1,
    ]))->assertStatus(200);
    ($this->actingAs($adminRole, 'api')->put('/products/1', [
        'status' => 1,
    ]))->assertStatus(200);
    ($this->actingAs($adminRole, 'api')->get('/products/1'))->assertStatus(200);
    ($this->actingAs($adminRole, 'api')->delete('/products/1'))->assertStatus(200);

});


