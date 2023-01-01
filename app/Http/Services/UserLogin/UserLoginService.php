<?php


namespace App\Http\Services\UserLogin;


use App\Exceptions\SchematicsException;
use App\Http\Services\RefreshToken\RefreshTokenRequest;
use App\Http\Services\RefreshToken\RefreshTokenService;
use App\Models\User;
use App\Models\VerifiedHostEnum;
use DateInterval;
use DateTime;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;
use Symfony\Component\ErrorHandler\Debug;

class UserLoginService
{
    /**
     * @throws SchematicsException
     */
    public function execute(UserLoginRequest $request)
    {
        $user = User::where('email', $request->getEmail());

        if (!$user) {
            throw SchematicsException::build('user-not-found');
        }

        if (Auth::attempt(['email' => $request->getEmail(), 'password' => $request->getPassword()])) {
            /** @var User $user */
            $user = Auth::user();
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

            $input = new RefreshTokenRequest($user);

            /** @var RefreshTokenService $refresh_token_service */
            $refresh_token_service = resolve(RefreshTokenService::class);

            $response = $refresh_token_service->execute($input);
        } else {
            throw new SchematicsException(
                config('error.msg.invalid-credentials'),
                config('error.code.invalid-credentials')
            );
        }

        if ($url = $request->getRedirectToUrl()) {
            $url_parsed = parse_url($url);
        
            if (!array_key_exists('host', $url_parsed)) {
                throw new SchematicsException("URL tidak dapat diproses", 1001);
            }
            
            if (!array_key_exists('scheme', $url_parsed) || (App::environment('production') && $url_parsed['scheme'] != 'https')) {
                throw new SchematicsException("URL harus https", 1001);
            }
    
            $verified = App::environment('production') ?
                        (VerifiedHostEnum::VERIFIED_URL_PROD[$url_parsed['host']] ?? null) :
                        (VerifiedHostEnum::VERIFIED_URL_DEV[$url_parsed['host']] ?? null);
    
            if (!$verified) {
                throw new SchematicsException("URL tidak diketahui", 1001);
            }
        }

        Cookie::queue(
            'refresh_token',
            $response->getRefreshToken(),
            14400, # 10 hari
        );

        return new UserLoginResponse($jwt);
    }
}
