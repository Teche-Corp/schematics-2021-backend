<?php


namespace App\Http\Services\ResetPassword;


use App\Exceptions\SchematicsException;
use App\Models\User;
use DateTime;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class ResetPasswordService
{
	/**
	 * @throws SchematicsException
	 */
	public function execute(ResetPasswordRequest $request)
	{
		$decoded_token = Crypt::decrypt($request->getToken());

		if ($this->isExpired($decoded_token['exp']) ||
			!$this->isValid($decoded_token['email'], $request->getToken())
		) {
			throw new SchematicsException("Request reset password telah kadaluarsa", 1010);
		}

		/** @var User $user */
		$user = User::where('email', $decoded_token['email'])
			->where('name', $decoded_token['name'])
			->where('phone', $decoded_token['phone'])
			->where('user_role', $decoded_token['user_role'])
			->first();

		if (!$user) {
			throw SchematicsException::build('user-not-found');
		}

		if ($user->passwordIsMatchWith($request->getNewPassword())) {
			throw new SchematicsException("Password baru harus berbeda dengan password sebelumnya", 1012);
		}

		$this->invalidateToken($user->email);
		$user->setPassword($request->getNewPassword());
		$user->save();
	}

	private function isExpired(string $expired_timestamp): bool
	{
		return $expired_timestamp < (new DateTime())->getTimestamp();
	}

	private function isValid(string $email, string $token): bool
	{
		$row = DB::table('password_resets')->where('email', $email)->first();

		if (!$row || ($row->token !== $token)) {
			return false;
		}

		return true;
	}

	private function invalidateToken(string $email)
	{
		DB::table('password_resets')->where('email', $email)->delete();
	}
}
