<?php

namespace App\Guard;

use App\Models\User;
use Firebase\JWT\JWT;
use Illuminate\Auth\GuardHelpers;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Http\Request;

/**
 * Guard used for JWT ONLY.
 * Refresh token tidak perlu pakai guard begini,
 * karena refresh token request one time (harapannya)
 * ke route tersendiri.
 */
class ApiAuthJwtGuard implements Guard
{
    use GuardHelpers;

    /**
     * Create a new authentication guard.
     *
     * @param  \Illuminate\Contracts\Auth\UserProvider  $provider
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function __construct(UserProvider $provider, Request $request)
    {
        $this->request = $request;
        $this->provider = $provider;
        $this->user = null;
    }

    /**
     * Get the currently authenticated user.
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function user()
    {
        // If we've already retrieved the user for the current request we can just
        // return it back immediately. We do not want to fetch the user data on
        // every call to this method because that would be tremendously slow.
        if (isset($this->user)) {
            return $this->user;
        }

        if ($this->validate()) {
            return $this->user;
        }

        return null;
    }

    /**
     * Get jwt from request.
     * 
     * @return string|null
     */
    public function getAuthParams()
    {
        $jwt = $this->request->bearerToken();

        return (!$jwt)? null : ['jwt' => $jwt];
    }

    /**
     * Validate a user's credentials.
     *
     * @param  array  $credentials
     * @return bool
     */
    public function validate(array $credentials = [])
    {
        if (!isset($credentials['jwt']) || empty($credentials['jwt'])) {
            if (!($credentials=$this->getAuthParams())) {
                return false;
            }
        }

        try {
            $jwt_decoded = JWT::decode($credentials['jwt'], config('app.key'), array("HS256"));
        } catch (\Throwable $th) {
            return false;
        }

        $credentials['jwt'] = $jwt_decoded;
        $credentials['email'] = $jwt_decoded->email;

        $user = $this->provider->retrieveByCredentials($credentials);
        if (!isset($user)) {
            return false;
        }

        if ($this->provider->validateCredentials($user, $credentials)) {
            if (!isset($user)) {
                return false;
            }

            $this->setUser($user);
            return true;
        }

        return false;
    }
}