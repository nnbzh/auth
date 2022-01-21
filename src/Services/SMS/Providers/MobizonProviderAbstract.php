<?php

namespace App\Services\Sms;

use Illuminate\Support\Facades\Http;
use Itech\Auth\Services\SMS\Providers\AbstractSmsProvider;

class MobizonProviderAbstract extends AbstractSmsProvider
{

    protected string $url = 'https://api.mobizon.kz/service/message/sendSmsMessage';

    public function send($to, $data)
    {
        $apiKey = config('itech.auth.sms.mobizon.apiKey');
        $params = [
            'apiKey' => $apiKey,
            'recipient' => $to,
            'text' => $data,
            'from' => config('itech.auth.sms.sender'),
        ];

        Http::post($this->url, $params);
    }
}
