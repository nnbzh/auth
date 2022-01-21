<?php

namespace Itech\Auth\Services\SMS\Providers;

use Illuminate\Support\Facades\Http;

class SmscProviderAbstract extends AbstractSmsProvider
{
    protected string $url = 'https://smsc.kz/sys/send.php';

    function send($to, $data)
    {
        $login      = config('itech.auth.sms.providers.smsc.login');
        $password   = config('itech.auth.sms.providers.smsc.password');
        $params     = [
            'login'     => $login,
            'psw'       => $password,
            'phones'    => $to,
            'sender'    => config('itech.auth.sms.sender', 'Itech'),
            'mes'       => $data
        ];

        Http::get($this->url, $params);
    }
}
