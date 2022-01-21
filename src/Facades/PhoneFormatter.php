<?php

namespace Itech\Auth\Facades;

use Illuminate\Support\Facades\Facade;

class PhoneFormatter extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PhoneFormatterHelper';
    }
}
