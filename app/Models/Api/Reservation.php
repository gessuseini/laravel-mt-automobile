<?php

namespace App\Models\Api;

class Reservation extends \App\Models\Reservation
{
    public function getRouteKeyName()
    {
        return 'reservation_id';
    }
}
