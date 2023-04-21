<?php

namespace App\Features;

use Illuminate\Support\Lottery;

class UiVer2
{
    /**
     * Resolve the feature's initial value.
     */
    public function resolve(mixed $scope): mixed
    {
        return Lottery::odds(1 / 2);
    }
}
