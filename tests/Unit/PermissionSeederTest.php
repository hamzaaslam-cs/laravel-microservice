<?php


use App\Models\Permission;
use App\Models\Role;
use Database\Seeders\DefaultUsersSeeder;

use Database\Seeders\PermissionSeeder;
use Database\Seeders\RolesSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

// Using the `uses()` function to inherit from TestCase and include RefreshDatabase
uses(TestCase::class, RefreshDatabase::class);

it('test permission seeder', function () {
    // Act: Run the seeder
    $this->seed(RolesSeeder::class);
    $this->seed(PermissionSeeder::class);


    // Assert: Check that 3 users were created
    expect(Permission::count())->toBe(64);

    $adminRole = Role::whereName(\App\Enums\Role::ADMIN->value)->first();
    $managerRole = Role::whereName(\App\Enums\Role::MANAGER->value)->first();
    $userRole = Role::whereName(\App\Enums\Role::USER->value)->first();


    expect($adminRole->hasAllPermissions([
        'list-user',
        'view-user',
        'create-user',
        'edit-user',
        'delete-user',
        'index-user',
        'show-user',
        'store-user',
        'update-user',
        'destroy-user',
        'list-manager',
        'view-manager',
        'create-manager',
        'edit-manager',
        'delete-manager',
        'index-manager',
        'show-manager',
        'store-manager',
        'update-manager',
        'destroy-manager',
        'list-role',
        'view-role',
        'create-role',
        'edit-role',
        'delete-role',
        'assign-role',
        'un-assign-role',
        'index-role',
        'show-role',
        'store-role',
        'update-role',
        'destroy-role',
        'list-permission',
        'view-permission',
        'create-permission',
        'edit-permission',
        'delete-permission',
        'assign-permission',
        'un-assign-permission',
        'index-permission',
        'show-permission',
        'store-permission',
        'update-permission',
        'destroy-permission',
        'list-product',
        'view-product',
        'create-product',
        'edit-product',
        'delete-product',
        'index-product',
        'show-product',
        'store-product',
        'update-product',
        'destroy-product',
        'list-order',
        'view-order',
        'create-order',
        'edit-order',
        'delete-order',
        'index-order',
        'show-order',
        'store-order',
        'update-order',
        'destroy-order'
    ]))->toBeTrue()
        ->and($managerRole->hasAllPermissions([
            'list-user', 'view-user', 'create-user', 'edit-user', 'delete-user', 'index-user', 'show-user', 'store-user', 'update-user', 'destroy-user', 'list-product', 'view-product', 'create-product', 'edit-product', 'delete-product', 'index-product', 'show-product', 'store-product', 'update-product', 'destroy-product', 'list-order', 'view-order', 'create-order', 'edit-order', 'delete-order', 'index-order', 'show-order', 'store-order', 'update-order', 'destroy-order'
        ]))->toBeTrue()
        ->and($userRole->hasAllPermissions([
            'list-product', 'show-product', 'list-order', 'view-order', 'create-order', 'edit-order', 'delete-order', 'index-order', 'show-order', 'store-order', 'update-order', 'destroy-order'
        ]))->toBeTrue();

});
