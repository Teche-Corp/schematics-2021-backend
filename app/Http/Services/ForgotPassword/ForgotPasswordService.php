<?php


namespace App\Http\Services\ForgotPassword;


use App\Exceptions\SchematicsException;
use App\Mail\ForgotPasswordEmail;
use App\Models\User;
use DateInterval;
use DateTime;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordService
{
    public function execute(ForgotPasswordRequest $request)
    {
        /** @var User $user */
        $user = User::where('email', $request->getEmail())->first();

        if (!$user) {
            throw SchematicsException::build('user-not-found');
        }

        $token = Crypt::encrypt(
            [
                'email' => $user->email,
                'name' => $user->name,
                'phone' => $user->phone,
                'user_role' => $user->user_role,
                'exp' => (new DateTime())->add(new DateInterval('PT30M'))->getTimestamp()
            ]
        );

        $this->upsertPasswordResetToken($user, $token);

        Mail::to($request->getEmail())
            ->send(new ForgotPasswordEmail([], $token));
    }

    private function upsertPasswordResetToken(User $user, string $token)
    {
        DB::table('password_resets')->updateOrInsert(
            [
                'email' => $user->email
            ],
            [
                'token' => $token
            ]
        );
    }
}
