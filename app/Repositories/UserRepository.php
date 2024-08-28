<?php

namespace App\Repositories;

use App\Enums\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserRepository
{
    public function find($id)
    {
        return User::find($id);
    }

    public function store(array $attributes)
    {
        $user = User::create([
            'name' => $attributes['name'],
            'email' => $attributes['email'],
            'password' => bcrypt($attributes['password'])
        ]);

        if (!empty($attributes["role"])) {
            $user->assignRole($attributes["role"]);
        } else {
            $user->assignRole(Role::USER->value);
        }
        return $user;
    }


    public function all(): Collection
    {

        $user = new User();

        if (auth()->user()->hasRole(Role::MANAGER->value)) {
            $user = $user->whereHas('roles', function ($query) {
                $query->whereIn('roles.name', [Role::USER->value]);
            });
        } else if (auth()->user()->hasRole(Role::USER->value)) {
            $user = $user->where("id", auth()->user()->id);
        }
        return $user->get();
    }

    public function update($id, array $attributes)
    {
        return User::where("id", $id)->update($attributes);
    }

    public function delete($id): int
    {
        return User::destroy($id);
    }
}
