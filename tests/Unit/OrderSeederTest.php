<?php


use App\Models\Order;
use App\Models\Role;
use Database\Seeders\DefaultUsersSeeder;

use Database\Seeders\OrderSeeder;
use Database\Seeders\PermissionSeeder;
use Database\Seeders\ProductsSeeder;
use Database\Seeders\RolesSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

// Using the `uses()` function to inherit from TestCase and include RefreshDatabase
uses(TestCase::class, RefreshDatabase::class);

it('test order seeder', function () {
    // Act: Run the seeder
    $this->seed(RolesSeeder::class);
    $this->seed(PermissionSeeder::class);
    $this->seed(DefaultUsersSeeder::class);
    $this->seed(ProductsSeeder::class);
    $this->seed(OrderSeeder::class);

    // Assert: Check that 3 users were created
    expect(Order::count())->toBe(2);
});
