<?php

namespace Itech\Auth;

use Illuminate\Support\ServiceProvider;
use Itech\Auth\Helpers\PhoneFormatterHelper;
use Itech\Auth\Services\SMS\SmsService;

class HelperServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('PhoneFormatterHelper', PhoneFormatterHelper::class);
        $this->app->bind('SmsService', SmsService::class);
    }
}
