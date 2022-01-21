<?php

namespace Itech\Auth\Traits;

use Illuminate\Http\Request;

trait IssuesToken
{
    public function issueToken(Request $request, $grantType, $scope = "")
    {
        $params = [
            'grant_type'    => $grantType,
            'client_id'     => config('itech.auth.passport.client_id'),
            'client_secret' => config('itech.auth.passport.client_secret'),
            'scope'         => $scope
        ];

        if ($grantType == 'password') {
            $params['username'] = $request->username ?? $request->email ?? '';
        }

        $params = array_merge($request->all(), $params);
        $proxy = Request::create('oauth/token', 'POST', $params, [], [], $request->server());
        $pipeline = app()->dispatch($proxy);

        if (! $pipeline->isSuccessful()) {
            $pipeline->throwResponse();
        }

        return $pipeline;
    }
}
