<?php


namespace App\Models;


use App\Exceptions\SchematicsException;

class UserRole extends SchematicsEnum
{
    public const ADMIN = 'admin';
    public const USER = 'user';

    protected function onErrorException(): SchematicsException
    {
        return SchematicsException::build('invalid-enum');
    }
}
