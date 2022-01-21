<?php

namespace Itech\Auth\Http\Requests;

use Pearl\RequestValidate\RequestAbstract;

class VerifyOtpRequest extends RequestAbstract
{
    public function rules() {
        return [
            'phone' => 'required',
            'code'  => 'required'
        ];
    }
}
