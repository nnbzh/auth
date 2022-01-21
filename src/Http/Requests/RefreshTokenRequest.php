<?php

namespace Itech\Auth\Http\Requests;

use Pearl\RequestValidate\RequestAbstract;

class RefreshTokenRequest extends RequestAbstract
{
    public function rules() {
        return [
            'refresh_token' => 'required'
        ];
    }
}
