<?php


namespace App\Http\Services\UserLogin;


class UserLoginRequest
{
    private string $email;
    private string $password;
    private string|null $redirect_to;

    /**
     * UserLoginRequest constructor.
     * @param string $email
     * @param string $password
     */
    public function __construct(string $email, string $password, string|null $redirect_to=null)
    {
        $this->email = $email;
        $this->password = $password;
        $this->redirect_to = $redirect_to;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string|null
     */
    public function getRedirectToUrl(): string|null
    {
        return $this->redirect_to;
    }
}
