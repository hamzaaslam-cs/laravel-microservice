<?php

namespace App\Enums;

use App\Traits\EnumHelpers;

enum Role: string
{
    use EnumHelpers;

    case ADMIN = "admin";
    case MANAGER = "manager";
    case USER = "user";
}
