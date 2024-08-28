<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    protected $model = \App\Models\Product::class;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Product::factory(10)->create(); // Creates 50 fake products
    }
}
