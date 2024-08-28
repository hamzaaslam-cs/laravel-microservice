<?php

namespace App\Repositories;

use App\Enums\Role;
use App\Models\Order;

class OrderRepository
{
    public function find($id)
    {
        return Order::find($id);
    }

    public function store($attributes)
    {
        return Order::create($attributes);
    }


    public function all()
    {
        $orders = Order::with('user:id,name','product:id,name');

        if (auth()->user()->hasRole(Role::MANAGER->value)) {
            $orders->where(function ($query) {
                $query->whereHas("user.roles", function ($q) {
                    $q->whereIn("roles.name", [Role::USER->value]);
                });
                $query->orWhere("user_id", auth()->user()->id);
            });
        } elseif (auth()->user()->hasRole(Role::USER->value)) {
            $orders = $orders->where("user_id", auth()->user()->id);
        }

        return $orders->get();
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
