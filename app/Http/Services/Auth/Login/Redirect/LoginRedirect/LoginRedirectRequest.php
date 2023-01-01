<?php

namespace App\Http\Services\Auth\Login\Redirect\LoginRedirect;

class LoginRedirectRequest
{
    private string|null $refresh_token;
    private string $redirect_to;

    /**
     * @param string|null
     * @param string
     */
    public function __construct(string|null $refresh_token, string $redirect_to)
    {
        $this->refresh_token = $refresh_token;
        $this->redirect_to = $redirect_to;
    }

    /**
     * @return string
     */
    public function getRefreshToken()
    {
        return $this->refresh_token ?? "";
    }


    /**
     * @return string
     */
    public function getRedirectTo()
    {
        return $this->redirect_to;
    }
}