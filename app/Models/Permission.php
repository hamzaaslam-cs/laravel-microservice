<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission as permissionModal;

class Permission extends permissionModal
{
    use HasFactory;

    protected $guarded = [];
    protected string $guard_name = '*';

}
