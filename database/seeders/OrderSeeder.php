<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product1=Product::find(1);
        $product2=Product::find(2);

         Order::create(['user_id' =>3,'product_id' => $product1->id,'quantity' =>$product1->price*2,]);
         Order::create(['user_id' =>3,'product_id' => $product2->id,'quantity' => $product2->price*2,]);
    }
}
