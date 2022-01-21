<?php

namespace Itech\Auth\Http\Requests;

use Pearl\RequestValidate\RequestAbstract;

class SendOtpRequest extends RequestAbstract
{
    public function rules() {
        return config('itech.auth.grants.otp.rules');
    }
}
