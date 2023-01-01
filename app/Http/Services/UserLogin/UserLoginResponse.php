<?php


namespace App\Http\Services\UserLogin;


use JsonSerializable;

class UserLoginResponse implements JsonSerializable
{
    private string $jwt;

    /**
     * UserLoginResponse constructor.
     * @param string $jwt
     * @param string $refresh_token
     */
    public function __construct(string $jwt)
    {
        $this->jwt = $jwt;
    }

    public function jsonSerialize(): array
    {
        return [
            'jwt' => $this->jwt
        ];
    }
}
