<?php


namespace App\Http\Services\RefreshToken;

use JsonSerializable;

class RefreshTokenResponse implements JsonSerializable
{
    private string $refresh_token;

    /**
     * UserLoginResponse constructor.
     * @param string $refresh_token
     */
    public function __construct(string $refresh_token)
    {
        $this->refresh_token = $refresh_token;
    }

    public function jsonSerialize()
    {
        return [
            'refresh_token' => $this->refresh_token
        ];
    }

    /**
     * @return string
     */
    public function getRefreshToken(): string
    {
        return $this->refresh_token;
    }
}
