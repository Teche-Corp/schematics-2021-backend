<?php


namespace App\Http\Services\ForgotPassword;


class ForgotPasswordRequest
{
    private string $email;

    /**
     * ForgotPasswordRequest constructor.
     * @param string $email
     */
    public function __construct(string $email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

}
