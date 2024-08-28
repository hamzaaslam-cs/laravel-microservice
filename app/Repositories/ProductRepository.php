<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    public function find($id)
    {
        return Product::find($id);
    }

    public function all()
    {
        return Product::all();
    }

    public function store($attributes)
    {
        return Product::create($attributes);
    }

    public function update($id, array $attributes)
    {
        return Product::where("id", $id)->update($attributes);
    }

    public function delete($id)
    {
        return Product::destroy($id);
    }
}
