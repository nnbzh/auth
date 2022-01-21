<?php

namespace Itech\Auth\Http\Requests;

use Pearl\RequestValidate\RequestAbstract;

class LoginRequest extends RequestAbstract
{
    public function rules() {
        return config('itech.auth.grants.password.rules');
    }
}
