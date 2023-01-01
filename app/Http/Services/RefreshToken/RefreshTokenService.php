<?php


namespace App\Http\Services\RefreshToken;


use App\Exceptions\SchematicsException;
use App\Http\Services\UpdateRefreshTokenKey\UpdateRefreshTokenKeyRequest;
use App\Http\Services\UpdateRefreshTokenKey\UpdateRefreshTokenKeyService;
use Firebase\JWT\JWT;
use App\Models\User;
use DateInterval;
use DateTime;

class RefreshTokenService
{
    public function execute(RefreshTokenRequest $request)
    {
        $user = $request->getUser();
        $current_time = new DateTime();
        if (
            $user->refresh_token_key == null ||
            $current_time > $user->refresh_token_key_validated_until
        ) {
            $refreshTokenKeyRequest = new UpdateRefreshTokenKeyRequest($user);
            $refreshTokenKeyUpdater = resolve(UpdateRefreshTokenKeyService::class);
            $refreshTokenKeyUpdater->execute($refreshTokenKeyRequest);
        }

        // https://datatracker.ietf.org/doc/html/rfc7519#page-9
        $payload = array(
            // "iss" => "http://example.org",
            // "aud" => "http://example.com",
            "iat" => $current_time->format("U"),
            "nbf" => $current_time->format("U"),
            "exp" => $current_time->add(new DateInterval("P10D"))->format("U"),
            "email" => $user->email,
            "key" => $user->refresh_token_key,
        );

        try {
            $refresh_token = JWT::encode($payload, config("app.key"));
        } catch (\Throwable $th) {
            throw new SchematicsException($th->getMessage(), 0);
        }

        return new RefreshTokenResponse($refresh_token);
    }
}
