<?php


namespace App\Http\Controllers;

use App\Http\Services\Auth\Login\Redirect\LoginRedirect\LoginRedirectRequest;
use App\Http\Services\Auth\Login\Redirect\LoginRedirect\LoginRedirectService;
use App\Http\Services\ChangePassword\ChangePasswordRequest;
use App\Http\Services\ChangePassword\ChangePasswordService;
use App\Http\Services\ForgotPassword\ForgotPasswordRequest;
use App\Http\Services\ForgotPassword\ForgotPasswordService;
use App\Http\Services\GetUserInfo\GetUserInfoRequest;
use App\Http\Services\GetUserInfo\GetUserInfoService;
use App\Http\Services\RefreshJWT\RefreshJWTRequest;
use App\Http\Services\RefreshJWT\RefreshJWTService;
use App\Http\Services\ResetPassword\ResetPasswordRequest;
use App\Http\Services\ResetPassword\ResetPasswordService;
use App\Http\Services\UserEdit\UserEditRequest;
use App\Http\Services\UserEdit\UserEditService;
use App\Http\Services\UserLogin\UserLoginRequest;
use App\Http\Services\UserLogin\UserLoginService;
use App\Http\Services\UserRegister\UserRegisterRequest;
use App\Http\Services\UserRegister\UserRegisterService;
use App\Models\Mechanism\UnitOfWork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Throwable;

class AuthController extends Controller
{
	private UnitOfWork $unit_of_work;

	/**
	 * AuthController constructor.
	 * @param UnitOfWork $unit_of_work
	 */
	public function __construct(UnitOfWork $unit_of_work)
	{
		$this->unit_of_work = $unit_of_work;
	}

	public function UserRegister(Request $request)
	{
		$request->validate([
			'name' => 'required|max:255',
			'email' => 'required|max:255|email',
			'phone' => 'required|max:255',
			'password' => 'required|min:8|max:255',
		]);

		$input = new UserRegisterRequest(
			$request->input('name'),
			$request->input('email'),
			$request->input('phone'),
			$request->input('password')
		);

		/** @var UserRegisterService $service */
		$service = resolve(UserRegisterService::class);

		$this->unit_of_work->begin();
		$service->execute($input);
		$this->unit_of_work->commit();

		return $this->success();
	}

    public function UserLogin(Request $request)
	{
		$request->validate([
			'email' => 'required|max:255|email',
			'password' => 'required|min:8|max:255',
		]);

		$input = new UserLoginRequest(
			$request->input('email'),
			$request->input('password'),
			$request->input('redirect_to'),
		);

		/** @var UserLoginService $service */
		$service = resolve(UserLoginService::class);
		$response = $service->execute($input);

		return $this->successWithData($response);
	}

	public function UserEdit(Request $request)
	{
		$request->validate([
			'name' => 'required|max:255',
			'email' => 'required|max:255|email',
			'phone' => 'required|max:255',
		]);

		$input = new UserEditRequest(
			$request->input('name'),
			$request->input('email'),
			$request->input('phone'),
			// TODO auth::user harusnya di sini
		);

		/** @var UserEditService $service */
		$service = resolve(UserEditService::class);

		$this->unit_of_work->begin();
		$response = $service->execute($input);
		$this->unit_of_work->commit();

		return $this->successWithData($response);
	}

	public function ForgetPassword(Request $request)
	{
		$request->validate([
			'email' => 'required|max:255|email',
		]);

		$input = new ForgotPasswordRequest($request->input('email'));

		/** @var ForgotPasswordService $service */
		$service = resolve(ForgotPasswordService::class);

		$this->unit_of_work->begin();
		$service->execute($input);
		$this->unit_of_work->commit();

		return $this->success();
	}

	public function ChangePassword(Request $request)
	{
		$request->validate([
			'old_password' => 'required|min:8|max:255',
			'new_password' => 'required|min:8|max:255',
		]);

		$input = new ChangePasswordRequest(
			Auth::user(),
			$request->input('old_password'),
			$request->input('new_password')
		);

		/** @var ChangePasswordService $service */
		$service = resolve(ChangePasswordService::class);
		
		$this->unit_of_work->begin();
		$service->execute($input);
		$this->unit_of_work->commit();

		return $this->success();
	}

    public function RefreshAuthToken(Request $request)
    {
        $input = new RefreshJWTRequest(
            $request->cookie('refresh_token') ?? ''
        );

        /** @var RefreshJWTService $service */
        $service = resolve(RefreshJWTService::class);
		$response = $service->execute($input);

        return $this->successWithData($response);
    }

    public function ResetPassword(Request $request)
	{
		$request->validate([
			'token' => 'required|max:1500',
			'new_password' => 'required|min:8|max:255',
		]);

		$input = new ResetPasswordRequest(
			$request->input('token'),
			$request->input('new_password'),
		);

		/** @var ResetPasswordService $service */
		$service = resolve(ResetPasswordService::class);

		$this->unit_of_work->begin();
		$service->execute($input);
		$this->unit_of_work->commit();

		return $this->success();
	}

    /**
     * @throws Throwable
     */
    public function getUserInfo(){
        $input = new GetUserInfoRequest(
            Auth::user()
        );

        /** @var GetUserInfoService $service */
        $service = resolve(GetUserInfoService::class);
		$response = $service->execute($input);

        return $this->successWithData($response);
    }

	/**
	 * ! Kembalian bukan json, tapi view biasa atau redirect
	 */
	public function loginRedirect(Request $request) {
		$input = new LoginRedirectRequest(
            $request->cookie('refresh_token'),
			$request->input('redirect_to') ?? ''
        );

        /** @var LoginRedirectService $service */
        $service = resolve(LoginRedirectService::class);
		$response = $service->execute($input);
		
		return $response;
	}
}
