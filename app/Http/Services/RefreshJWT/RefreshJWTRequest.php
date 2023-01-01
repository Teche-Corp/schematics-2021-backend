<?php


namespace App\Http\Services\RefreshJWT;


class RefreshJWTRequest
{
    private string $refresh_token;

    /**
     * UserLoginRequest constructor.
     * @param string $email
     * @param string $password
     */
    public function __construct(string $refresh_token)
    {
        $this->refresh_token = $refresh_token;
    }

    /**
     * @return string
     */
    public function getRefreshToken(): string
    {
        return $this->refresh_token;
    }
}
