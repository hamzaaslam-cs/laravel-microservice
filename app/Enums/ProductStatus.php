<?php

namespace App\Enums;

use App\Traits\EnumHelpers;

enum ProductStatus: int
{
    use EnumHelpers;

    case ACTIVE = 1;
    case IN_ACTIVE = 0;
}
