<?php


namespace App\Http\Services\RefreshToken;

use App\Models\User;

class RefreshTokenRequest
{
    private User $user;

    /**
     * UserLoginRequest constructor.
     * @param string $email
     * @param string $password
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }
}
