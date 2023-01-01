<?php


namespace App\Http\Services\GetUserInfo;


use App\Models\User;

class GetUserInfoRequest
{
    private User $user;

    /**
     * GetUserInfoRequest constructor.
     * @param User $user
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
