<?php

return [
    //Route prefix
    'route_prefix' => 'auth',

    'auth_model'   => 'App\\Models\\User',
    //Passport client
    'passport' => [
        'client_id'     => env('CLIENT_ID'),
        'client_secret' => env('CLIENT_SECRET')
    ],

    //Authorization types
    'grants' => [
        'password' => [
            'enabled' => env('LOGIN_BY_EMAIL', true),

            'rules' => [
                'email'     => 'required|email',
                'password'  => 'required',
            ],
        ],
        'otp' => [
            'enabled' => env('LOGIN_BY_PHONE', true),

            'rules' => [
                "phone" => "required|regex:/^(\s*)?(\+)?([- _():=+]?\d[- _():=+]?){10,14}(\s*)?$/"
            ]
        ]
    ],

    'sms'   => [
        'providers' => [
            'default' => env('SMS_SERVICE_PROVIDER', 'smsc'),

            'mobizon'   => [
                'apiKey' => env('MOBIZON_API_KEY'),
                'class'  => \App\Services\Sms\MobizonProviderAbstract::class
            ],

            'smsc'      => [
                'login'     => env('SMSC_LOGIN'),
                'password'  => env('SMSC_PASSWORD'),
                'class'     => \Itech\Auth\Services\SMS\Providers\SmscProviderAbstract::class
            ]
        ]
    ]
];
