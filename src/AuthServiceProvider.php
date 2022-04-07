<?php

namespace Itech\Auth;

use Dusterio\LumenPassport\LumenPassport;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    public function boot() {
        $this->loadConfigs();
        $this->loadRoutes();
    }

    public function register()
    {
        $this->registerProviders();
    }

    private function loadConfigs() {
        $this->mergeConfigFrom(__DIR__ . '/config/itech.auth.php', 'itech.auth');
    }

    private function loadRoutes() {
        LumenPassport::routes($this->app->router);
        $this->loadRoutesFrom(__DIR__. '/routes/itech.auth.php');
    }

    private function registerProviders() {
        $this->app->register(\Laravel\Passport\PassportServiceProvider::class);
        $this->app->register(\Dusterio\LumenPassport\PassportServiceProvider::class);
        $this->app->register(\Pearl\RequestValidate\RequestServiceProvider::class);
        $this->app->register(PhoneAuthServiceProvider::class);
        $this->app->register(HelperServiceProvider::class);
    }
}
