<?php


namespace App\Http\Services\ChangePassword;

use App\Models\User;

class ChangePasswordRequest
{
    private User $user;
    private string $old_password;
    private string $new_password;

    /**
     * ChangePasswordRequest constructor.
     * @param string $email
     * @param string $old_password
     * @param string $new_password
     */
    public function __construct(User $user, string $old_password, string $new_password)
    {
        $this->user = $user;
        $this->old_password = $old_password;
        $this->new_password = $new_password;
    }

    /**
     * @return string
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @return string
     */
    public function getOldPassword(): string
    {
        return $this->old_password;
    }
    /**
     * @return string
     */
    public function getNewPassword(): string
    {
        return $this->new_password;
    }

}
