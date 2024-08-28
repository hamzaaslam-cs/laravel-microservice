<?php

use App\Models\Product;
use Database\Seeders\ProductsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

// Using the `uses()` function to inherit from TestCase and include RefreshDatabase
uses(TestCase::class, RefreshDatabase::class);

it('test product seeder', function () {
    // Act: Run the seeder
    $this->seed(ProductsSeeder::class);

    // Assert: Check that 3 users were created
    expect(Product::count())->toBe(10);
});
