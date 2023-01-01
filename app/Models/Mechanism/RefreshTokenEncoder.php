<?php


namespace App\Models\Mechanism;


use App\Exceptions\SchematicsException;
use App\Http\Services\UpdateRefreshTokenKey\UpdateRefreshTokenKeyRequest;
use App\Models\User;
use DateInterval;
use DateTime;
use Firebase\JWT\JWT;
use Throwable;

class RefreshTokenEncoder
{
    /**
     * @throws Throwable
     */
    public static function generate(User $user=null, string $email=null)
    {
        if (!$user) {
            if (!$user) {
                throw new SchematicsException(config('error.msg.invalid-function-arguments'),
                                              config('error.code.invalid-function-arguments'));
            }

            $attributes = $user->getAttributes();
            if (!isset($attributes['email'])) {
                throw SchematicsException::build('user-not-found');
            }

            if (
                !isset($attributes['refresh_token_key_validated_until']) ||
                !isset($attributes['refresh_token_key'])
            ) {
                $user = User::select('email, refresh_token_key_validated_until, refresh_token_key')
                            ->where('email', $user->email);
            }
        } else {
            $user = User::select('email, refresh_token_key_validated_until, refresh_token_key')
                        ->where('email', $user->email);
        }

        $current_time = new DateTime();
        if (
            $user->refresh_token_key == null ||
            $current_time > $user->refresh_token_key_validated_until
        ) {
            $refreshTokenKeyRequest = new UpdateRefreshTokenKeyRequest($user);
            $refreshTokenKeyUpdater = resolve(UpdateRefreshTokenKeyService::class);
            $refreshTokenKeyUpdater->execute($refreshTokenKeyRequest);
        }

        $payload = array(
            // "iss" => "http://example.org",
            // "aud" => "http://example.com",
            "iat" => $current_time->format("U"),
            "nbf" => $current_time->format("U"),
            "exp" => $current_time->add(new DateInterval("P7D"))->format("U"),
            "email" => $user->email,
            "key" => $user->refresh_token_key,
        );

        try {
            $refresh_token = JWT::encode($payload, config("app.key"));
        } catch (\Throwable $th) {
            throw new SchematicsException($th->getMessage(), 0); // TODO sesuaikan config error
        }

        return $refresh_token;
    }
}
