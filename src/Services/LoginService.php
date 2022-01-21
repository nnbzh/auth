<?php

namespace Itech\Auth\Services;

use Illuminate\Support\Facades\Cache;
use Itech\Auth\Facades\PhoneFormatter;
use Itech\Auth\Services\SMS\Facades\Sms;

class LoginService
{
    public function __construct() {}

    public function sendOtp($data) {
        $phone = PhoneFormatter::clear($data['phone']);

        if (app()->environment() == 'production') {
            $code  = rand(1000, 9999);
            Sms::send($phone, "Код для входа: $code");
        } else {
            $code = $phone % 10000;
        }

        Cache::put("phone/code/$phone", $code, 120);

        return $code;
    }

    public function logout($user) {
        $token = $user->currentAccessToken();
        $token->revoke();
        app('Laravel\Passport\RefreshTokenRepository')->revokeRefreshTokensByAccessTokenId($token->id);
    }
}
