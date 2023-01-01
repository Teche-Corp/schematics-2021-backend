<?php


namespace App\Http\Services\ChangePassword;

use App\Exceptions\SchematicsException;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;

class ChangePasswordService
{

    public function execute(ChangePasswordRequest $request)
    {
        /** @var User $user */
        $user = $request->getUser();
        $user->makeVisible(['password']);

        if(!Hash::check($request->getOldPassword(),$user->password)) {
            // password lama ga match
            // TODO: error handling
            throw new SchematicsException("Password lama tidak cocok", 1000);
        }

        $user->password = Hash::make($request->getNewPassword());

		try {
			$user->save();
		} catch (Exception $e) {
			throw SchematicsException::build('db-fail-to-save');
		}
    }

}
