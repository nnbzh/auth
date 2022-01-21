<?php

namespace Itech\Auth\Services\SMS;

class SmsService
{
    public function send($to, $data) {
        $defaultProvider    = config('itech.auth.sms.providers.default');
        $provider           = config("itech.auth.sms.providers.$defaultProvider.class");
        $provider           = new $provider;

        $provider->send($to, $data);
    }
}
