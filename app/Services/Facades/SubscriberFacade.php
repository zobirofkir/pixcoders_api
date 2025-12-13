<?php

namespace App\Services\Facades;

use Illuminate\Support\Facades\Facade;

class SubscriberFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'SubscriberService';
    }
}
