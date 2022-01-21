<?php

namespace Itech\Auth;

use Illuminate\Support\ServiceProvider;
use Itech\Auth\Http\Grants\PhoneGrant;
use Laravel\Passport\Bridge\RefreshTokenRepository;
use Laravel\Passport\Bridge\UserRepository;
use League\OAuth2\Server\AuthorizationServer;

class PhoneAuthServiceProvider extends ServiceProvider
{
    public function boot() {

    }

    public function register()
    {
        app()->afterResolving(AuthorizationServer::class, function (AuthorizationServer $server) {
            $grant = $this->makeGrant();
            $server->enableGrantType($grant);
        });
    }

    /**
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    private function makeGrant(): PhoneGrant
    {
        return new PhoneGrant(
            $this->app->make(UserRepository::class),
            $this->app->make(RefreshTokenRepository::class),
        );
    }
}
