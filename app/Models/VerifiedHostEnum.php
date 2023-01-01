<?php

namespace App\Models;


use App\Exceptions\SchematicsException;

class VerifiedHostEnum extends SchematicsEnum
{

    /**
     *  VERIFIED_URL ARRAY STRUCTURE
     * 
     * [
     *      'HOST' => [
     *          'LOGIN_ROUTE',
     *      ], ...
     * ]
     */

    public const VERIFIED_URL_PROD = [
        'schematics.its.ac.id' => [
            'dashboard',
        ],
        'junior.schematics-npc.com' => [
            'accounts/schematics/auth/login',
        ],
        'senior.schematics-npc.com' => [
            'accounts/schematics/auth/login',
        ],
    ];

    public const VERIFIED_URL_DEV = [
        '127.0.0.1' => [
            'login'
        ],
        'localhost' => [
            'login'
        ],
        'dashboard-schematics.vercel.app' => [
            'signin'
        ],
    ];

    protected function onErrorException(): SchematicsException
    {
        throw new SchematicsException("Invalid URL", 1016);
    }
}
