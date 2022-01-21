<?php

namespace Itech\Auth\Http\Controllers;

use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function user() {
        return request()->user();
    }
}
