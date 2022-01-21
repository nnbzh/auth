<?php

namespace Itech\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Itech\Auth\Http\Requests\LoginRequest;
use Itech\Auth\Http\Requests\RefreshTokenRequest;
use Itech\Auth\Http\Requests\SendOtpRequest;
use Itech\Auth\Http\Requests\VerifyOtpRequest;
use Itech\Auth\Services\LoginService;
use Itech\Auth\Traits\IssuesToken;

class AuthController extends Controller
{
    use IssuesToken;

    public function __construct(private LoginService $loginService) {}

    public function login(LoginRequest $request) {
        return response()->json(['data' => $this->generateTokens($request, 'password')]);
    }

    public function requestOtp(SendOtpRequest $request) {
        if (! config('itech.auth.grants.otp.enabled')) {
            return response()->json(['Authentication by phone number is disabled. Hint: change to enabled: true in config']);
        }

        $code = $this->loginService->sendOtp($request->validated());

        if (app()->environment() != 'production') {
            return response()->json(['data' => ['otp' => $code]]);
        }

        return response()->json(null, 204);
    }

    public function verifyOtp(VerifyOtpRequest $request): \Illuminate\Http\JsonResponse
    {
        return response()->json(['data' => $this->generateTokens($request, 'phone')]);
    }

    public function refreshToken(RefreshTokenRequest $request) {
        return response()->json(['data' => $this->generateTokens($request, 'refresh_token')]);
    }

    public function logout(Request $request) {
        $this->loginService->logout($request->user());

        return response()->json(null, 204);
    }

    private function generateTokens($request, $grant) {
        return json_decode($this->issueToken($request, $grant)?->getContent());
    }
}
