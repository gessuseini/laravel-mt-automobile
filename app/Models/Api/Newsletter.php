<?php

namespace App\Models\Api;

class Newsletter extends \App\Models\Newsletter
{
    public function getRouteKeyName()
    {
        return 'id';
    }
}
