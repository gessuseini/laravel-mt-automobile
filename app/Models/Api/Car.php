<?php

namespace App\Models\Api;

class Car extends \App\Models\Car
{
    public function getRouteKeyName()
    {
        return 'id';
    }
}
