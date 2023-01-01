<?php


namespace App\Http\Services\UserEdit;


use JsonSerializable;

class UserEditResponse implements JsonSerializable
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

    public function jsonSerialize(): array
    {
        return [
            'jwt' => $this->jwt
        ];
    }
}
