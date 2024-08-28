<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    protected $model = Product::class;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory(10)->create(); // Creates 50 fake products
    }
}
