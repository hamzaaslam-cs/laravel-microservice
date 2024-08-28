<?php

namespace App\Models;

use Spatie\Permission\Models\Role as roleModal;

class Role extends roleModal
{

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'display_name',
        'guard_name',
    ];

    protected $guarded = [];
    protected string $guard_name = '*';


}
