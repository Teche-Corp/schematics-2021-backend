<?php


namespace App\Http\Services\UserEdit;


class UserEditRequest
{
    private ?string $name;
    private ?string $email;
    private ?string $phone;

    /**
     * UserRegisterRequest constructor.
     * @param string|null $name
     * @param string|null $email
     * @param string|null $phone
     */
    public function __construct(?string $name, ?string $email, ?string $phone)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }
}