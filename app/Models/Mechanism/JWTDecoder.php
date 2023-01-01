<?php


namespace App\Models\Mechanism;


use App\Exceptions\SchematicsException;
use App\Models\User;
use Firebase\JWT\JWT;
use Throwable;

class JWTDecoder
{
    /**
     * @throws Throwable
     */
    public static function decode($jwt): User
    {
        $decoded = JWT::decode($jwt, config('app.key'), array("HS256"));

        $user = User::where('email', $decoded->email)
            ->where('phone', $decoded->phone)
            ->where('user_role', $decoded->user_role)
            ->where('name', $decoded->name)
            ->first();

        if (!$user) {
            throw new SchematicsException('User tidak ditemukan', 1008);
        }

        return $user;
    }
}
