<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api')->name('logout');
    Route::post('/refresh', [AuthController::class, 'refresh'])->middleware('auth:api')->name('refresh');
    Route::post('/me', [AuthController::class, 'me'])->middleware('auth:api')->name('me');
});

Route::middleware('api')->get("test",function(){

//    $admin = User::create([
//        'name' => 'admin',
//        'email' => "admin@example.com",
//        'password' => bcrypt("12345678"),
//    ]);

    $admin=User::where("email","admin@example.com")->first();

    $adminRole = Role::whereName(\App\Enums\Role::ADMIN->value)->first();


//
    $admin->assignRole($adminRole);

    return $admin;
//    $role = \App\Models\Role::whereName(\App\Enums\Role::ADMIN->value)->first();
//
//    $permissions = \App\Models\Permission::get();
//
//    $role->syncPermissions($permissions);
//    return $permissions;
});
