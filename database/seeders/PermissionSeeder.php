<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            /********************   User    **********************/
            [
                'name' => Str::kebab("ListUser"),
                'guard_name' => '*',
            ],
            [
                'name' => Str::kebab("ViewUser"),
                'guard_name' => '*',
            ],
            [
                'name' => Str::kebab("CreateUser"),
                'guard_name' => '*',
            ],
            [
                'name' => Str::kebab("EditUser"),
                'guard_name' => '*',
            ],
            [
                'name' => Str::kebab("DeleteUser"),
                'guard_name' => '*',
            ],

            [
                'name' => Str::kebab("IndexUser"),
                'guard_name' => '*',
            ],
            [
                'name' => Str::kebab("ShowUser"),
                'guard_name' => '*',
            ],
            [
                'name' => Str::kebab("StoreUser"),
                'guard_name' => '*',
            ],
            [
                'name' => Str::kebab("UpdateUser"),
                'guard_name' => '*',
            ],
            [
                'name' => Str::kebab("DestroyUser"),
                'guard_name' => '*',
            ],
            /********************   Manager    **********************/
            [
                'name' => Str::kebab("ListManager"),
                'guard_name' => '*',
            ],
            [
                'name' => Str::kebab("ViewManager"),
                'guard_name' => '*',
            ],
            [
                'name' => Str::kebab("CreateManager"),
                'guard_name' => '*',
            ],
            [
                'name' => Str::kebab("EditManager"),
                'guard_name' => '*',
            ],
            [
                'name' => Str::kebab("DeleteManager"),
                'guard_name' => '*',
            ],

            [
                'name' => Str::kebab("IndexManager"),
                'guard_name' => '*',
            ],
            [
                'name' => Str::kebab("ShowManager"),
                'guard_name' => '*',
            ],
            [
                'name' => Str::kebab("StoreManager"),
                'guard_name' => '*',
            ],
            [
                'name' => Str::kebab("UpdateManager"),
                'guard_name' => '*',
            ],
            [
                'name' => Str::kebab("DestroyManager"),
                'guard_name' => '*',
            ],
            /********************   Role    **********************/
            [
                'name' => Str::kebab("ListRole"),
                'guard_name' => '*',
            ],
            [
                'name' => Str::kebab("ViewRole"),
                'guard_name' => '*',
            ],
            [
                'name' => Str::kebab("CreateRole"),
                'guard_name' => '*',
            ],
            [
                'name' => Str::kebab("EditRole"),
                'guard_name' => '*',
            ],
            [
                'name' => Str::kebab("DeleteRole"),
                'guard_name' => '*',
            ],
            [
                'name' => Str::kebab("AssignRole"),
                'guard_name' => '*',
            ],
            [
                'name' => Str::kebab("UnAssignRole"),
                'guard_name' => '*',
            ],

            [
                'name' => Str::kebab("IndexRole"),
                'guard_name' => '*',
            ],
            [
                'name' => Str::kebab("ShowRole"),
                'guard_name' => '*',
            ],
            [
                'name' => Str::kebab("StoreRole"),
                'guard_name' => '*',
            ],
            [
                'name' => Str::kebab("UpdateRole"),
                'guard_name' => '*',
            ],
            [
                'name' => Str::kebab("DestroyRole"),
                'guard_name' => '*',
            ],
            /********************   Permission    **********************/
            [
                'name' => Str::kebab("ListPermission"),
                'guard_name' => '*',
            ],
            [
                'name' => Str::kebab("ViewPermission"),
                'guard_name' => '*',
            ],
            [
                'name' => Str::kebab("CreatePermission"),
                'guard_name' => '*',
            ],
            [
                'name' => Str::kebab("EditPermission"),
                'guard_name' => '*',
            ],
            [
                'name' => Str::kebab("DeletePermission"),
                'guard_name' => '*',
            ],
            [
                'name' => Str::kebab("AssignPermission"),
                'guard_name' => '*',
            ],
            [
                'name' => Str::kebab("UnAssignPermission"),
                'guard_name' => '*',
            ],

            [
                'name' => Str::kebab("IndexPermission"),
                'guard_name' => '*',
            ],
            [
                'name' => Str::kebab("ShowPermission"),
                'guard_name' => '*',
            ],
            [
                'name' => Str::kebab("StorePermission"),
                'guard_name' => '*',
            ],
            [
                'name' => Str::kebab("UpdatePermission"),
                'guard_name' => '*',
            ],
            [
                'name' => Str::kebab("DestroyPermission"),
                'guard_name' => '*',
            ],
            /********************   Product    **********************/
            [
                'name' => Str::kebab("ListProduct"),
                'guard_name' => '*',
            ],
            [
                'name' => Str::kebab("ViewProduct"),
                'guard_name' => '*',
            ],
            [
                'name' => Str::kebab("CreateProduct"),
                'guard_name' => '*',
            ],
            [
                'name' => Str::kebab("EditProduct"),
                'guard_name' => '*',
            ],
            [
                'name' => Str::kebab("DeleteProduct"),
                'guard_name' => '*',
            ],

            [
                'name' => Str::kebab("IndexProduct"),
                'guard_name' => '*',
            ],
            [
                'name' => Str::kebab("ShowProduct"),
                'guard_name' => '*',
            ],
            [
                'name' => Str::kebab("StoreProduct"),
                'guard_name' => '*',
            ],
            [
                'name' => Str::kebab("UpdateProduct"),
                'guard_name' => '*',
            ],
            [
                'name' => Str::kebab("DestroyProduct"),
                'guard_name' => '*',
            ],

            /********************   Order    **********************/
            [
                'name' => Str::kebab("ListOrder"),
                'guard_name' => '*',
            ],
            [
                'name' => Str::kebab("ViewOrder"),
                'guard_name' => '*',
            ],
            [
                'name' => Str::kebab("CreateOrder"),
                'guard_name' => '*',
            ],
            [
                'name' => Str::kebab("EditOrder"),
                'guard_name' => '*',
            ],
            [
                'name' => Str::kebab("DeleteOrder"),
                'guard_name' => '*',
            ],

            [
                'name' => Str::kebab("IndexOrder"),
                'guard_name' => '*',
            ],
            [
                'name' => Str::kebab("ShowOrder"),
                'guard_name' => '*',
            ],
            [
                'name' => Str::kebab("StoreOrder"),
                'guard_name' => '*',
            ],
            [
                'name' => Str::kebab("UpdateOrder"),
                'guard_name' => '*',
            ],
            [
                'name' => Str::kebab("DestroyOrder"),
                'guard_name' => '*',
            ],


        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }


        $admin = \App\Models\Role::whereName(\App\Enums\Role::ADMIN->value)->first();
        $permissions = \App\Models\Permission::pluck('name', 'id');
        $admin->givePermissionTo($permissions);


        $manager = \App\Models\Role::whereName(\App\Enums\Role::MANAGER->value)->first();
        $permissions = \App\Models\Permission::where('name', 'like', '%user%')
            ->orWhere('name', 'like', '%product%')
            ->orWhere('name', 'like', '%order%')
            ->get()->pluck('name', 'id');

        $permissions[] = \App\Models\Permission::whereIn("name", ['list-product', 'show-product','add-product','store-product'])->get()->pluck('name', 'id');
        $manager->givePermissionTo($permissions);


        $user = \App\Models\Role::whereName(\App\Enums\Role::USER->value)->first();
        $permissions = \App\Models\Permission::where('name', 'like', '%order%')
            ->get()->pluck('name', 'id');

        $permissions[] = \App\Models\Permission::whereIn("name", ['list-product', 'show-product'])->get()->pluck('name', 'id');

        $user->givePermissionTo($permissions);


    }
}
