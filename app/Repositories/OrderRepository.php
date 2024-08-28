<?php

namespace App\Repositories;

use App\Models\Order;

class OrderRepository
{
    public function find($id)
    {
        return Order::find($id);
    }

    public function all()
    {
        return Order::all();
    }

    public function update($id, array $attributes)
    {
        return Order::where("id", $id)->update($attributes);
    }

    public function delete($id)
    {
        return Order::destroy($id);
    }
}
