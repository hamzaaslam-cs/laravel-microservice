<?php

namespace App\Traits;

trait GeneralTrait
{
    public function isWebGuard():bool{
        return isset(auth()->guard()->name) && auth()?->guard()?->name === "web";
    }
}
