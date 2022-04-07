<?php

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/

use Illuminate\Support\Facades\Route;

Route::group([
    'namespace' => 'Itech\Auth\Http\Controllers',
    'prefix'    => config('itech.auth.route_prefix')
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('login/otp', 'AuthController@requestOtp');
    Route::post('login/otp/verify', 'AuthController@verifyOtp');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('register', 'AuthController@register');

    Route::group(['middleware' => 'auth'], function () {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'UserController@user');
    });
});
