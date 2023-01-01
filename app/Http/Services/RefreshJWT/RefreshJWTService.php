<?php


namespace App\Http\Services\RefreshJWT;


use App\Exceptions\SchematicsException;
use App\Http\Services\UpdateRefreshTokenKey\UpdateRefreshTokenKeyRequest;
use App\Http\Services\UpdateRefreshTokenKey\UpdateRefreshTokenKeyService;
use Firebase\JWT\JWT;
use App\Models\User;
use DateInterval;
use DateTime;
use Illuminate\Support\Facades\Cookie;

class RefreshJWTService
{
    public function execute(RefreshJWTRequest $request)
    {
        try {
            $decoded_refresh_token = JWT::decode($request->getRefreshToken(), config("app.key"), array("HS256"));
        } catch (\Firebase\JWT\ExpiredException $th) {
            throw new SchematicsException("Sesi anda telah habis. Silahkan login kembali.", 1003);
        } catch (\Throwable $th) {
            throw new SchematicsException($th->getMessage(), 1004);
        }

        $user = User::select("*")
                    ->where("email", $decoded_refresh_token->email)
                    ->first();

        if (!$user){
            Cookie::queue(Cookie::forget('refresh_token'));
            throw new SchematicsException("User tidak ditemukan", 1002);
        }

        $current_time = new DateTime();
        if (
            $user->refresh_token_key == null ||
            $current_time > $user->refresh_token_key_validated_until
        ) {
            $refreshTokenKeyRequest = new UpdateRefreshTokenKeyRequest($user);
            $refreshTokenKeyUpdater = resolve(UpdateRefreshTokenKeyService::class);
            $refreshTokenKeyUpdater->execute($refreshTokenKeyRequest);
            Cookie::queue(Cookie::forget('refresh_token'));
            throw new SchematicsException("Sesi anda telah habis. Silahkan login kembali.", 1003);
        }

        if ($decoded_refresh_token->key != $user->refresh_token_key) {
            Cookie::queue(Cookie::forget('refresh_token'));
            throw new SchematicsException("Sesi anda telah habis. Silahkan login kembali.", 1006);
        }

        // Refresh token valid, generate jwt sesuai yang di login
        // sama persis seperti yang di login service

        /** @var User $user */
        $current_time = new DateTime();
        $jwt = JWT::encode(
            [
                'email' => $user->email,
                'name' => $user->name,
                'phone' => $user->phone,
                'user_role' => $user->user_role,
                'exp' => $current_time->add(new DateInterval('PT3H'))->getTimestamp()
            ],
            config('app.key')
        );

        return new RefreshJWTResponse($jwt);
    }
}
