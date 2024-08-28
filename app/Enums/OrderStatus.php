<?php

namespace App\Enums;

use App\Traits\EnumHelpers;

enum OrderStatus: int
{
    use EnumHelpers;

    case PENDING = 0;
    case IN_PROGRESS = 1;
    case COMPLETED = 2;
    case CANCELLED = 3;
}
