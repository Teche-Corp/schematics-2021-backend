<?php


namespace App\Http\Services\UserEdit;


use App\Exceptions\SchematicsException;
use App\Http\Services\RefreshToken\RefreshTokenRequest;
use App\Http\Services\RefreshToken\RefreshTokenService;
use App\Models\User;
use DateInterval;
use DateTime;
use Exception;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class UserEditService
{
    /**
     * @throws SchematicsException
     */
    public function execute(UserEditRequest $request)
    {
        $user = Auth::user();
        if ($request->getEmail()) {
            $user_exist = User::where('email', $request->getEmail())->exists();
            if ($user_exist && $request->getEmail() != $user->email) {
                throw SchematicsException::build('user-exists');
            }
        }

        /** @var User $user */
        $current_time = new DateTime();

        $user->email = $request->getEmail() ?? $user->email;
        $user->name = $request->getName() ?? $user->name;
        $user->phone = $request->getPhone() ?? $user->phone;

		try {
			$user->save();
		}
		catch (Exception $e){
			throw SchematicsException::build('db-fail-to-save');
		}

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

        Cookie::queue(
            'refresh_token',
            $response->getRefreshToken(),
            14400 # 10 hari
        );

        return new UserEditResponse($jwt);
    }
}
