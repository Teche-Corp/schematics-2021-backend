<?php


namespace App\Http\Services\UserRegister;

use App\Exceptions\SchematicsException;
use App\Models\User;
use App\Models\UserRole;
use Exception;
use Illuminate\Support\Facades\Hash;

class UserRegisterService
{
	public function execute(UserRegisterRequest $request)
	{
		$user_exist = User::where('email', $request->getEmail())->exists();
		if ($user_exist) {
			throw SchematicsException::build('user-exists');
		}

		try {
			User::create(
				[
					'name' => $request->getName(),
					'email' => $request->getEmail(),
					'phone' => $request->getPhone(),
					'password' => Hash::make($request->getPassword()),
					'user_role' => UserRole::USER,
				]
			);
		} catch (Exception $e) {
			throw SchematicsException::build('db-fail-to-save');
		}
	}
}
