<?php

namespace App\Providers\Auth;

use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;

class UserApiProvider implements UserProvider
{
    /**
     * @var User
     */
    private $model;

    public function __construct($userModel)
    {
        $this->model = $userModel;
    }

    /**
     * Retrieve a user by their unique identifier. (email)
     * ! email yes !
     * 
     * @param  mixed  $identifier (email)
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveById($identifier)
    {
        return $this->model->getUserByEmail($identifier);
    }

    /**
     * Retrieve a user by their unique identifier and "remember me" token.
     *
     * @param  mixed  $identifier
     * @param  string  $token
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveByToken($identifier, $token)
    {
        # Unused token karena tidak ada remember me
        return $this->model->getUserByEmail($identifier);
    }

    /**
     * Update the "remember me" token for the given user in storage.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  string  $token
     * @return void
     */
    public function updateRememberToken(Authenticatable $user, $token)
    {
        # not implemented, gak ada remember me
    }

    /**
     * Retrieve a user by the given credentials.
     *
     * @param  array  $credentials
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveByCredentials(array $credentials)
    {
        if (!$credentials || !$credentials['email']) {
            return;
        }

        return $this->model->getUserByEmail($credentials['email']);
    }

    /**
     * Validate a user against the given credentials.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  array  $credentials
     * @return bool
     */
    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        // Tidak cek refresh token karena dianggap tidak ke route request
        return (bool) ($credentials['email'] == $user->getAuthIdentifier());
    }
}
