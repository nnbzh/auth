<?php

namespace Itech\Auth\Services\SMS\Facades;

use Illuminate\Support\Facades\Facade;

class Sms extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'SmsService';
    }
}
