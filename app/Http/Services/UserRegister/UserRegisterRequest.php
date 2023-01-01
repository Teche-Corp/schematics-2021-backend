<?php


namespace App\Http\Services\UserRegister;


class UserRegisterRequest
{
    private string $name;
    private string $email;
    private string $phone;
    private string $password;

    /**
     * UserRegisterRequest constructor.
     * @param string $name
     * @param string $email
     * @param string $phone
     * @param string $password
     */
    public function __construct(string $name, string $email, string $phone, string $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
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
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }
}
