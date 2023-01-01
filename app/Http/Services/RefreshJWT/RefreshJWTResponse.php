<?php


namespace App\Http\Services\RefreshJWT;

use JsonSerializable;

class RefreshJWTResponse implements JsonSerializable
{
    private string $jwt;

    /**
     * UserLoginResponse constructor.
     * @param string $jwt
     */
    public function __construct(string $jwt)
    {
        $this->jwt = $jwt;
    }

    public function jsonSerialize()
    {
        return [
            'jwt' => $this->jwt
        ];
    }
}
