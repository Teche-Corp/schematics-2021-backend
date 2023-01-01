<?php


namespace App\Http\Services\UpdateRefreshTokenKey;


use Illuminate\Support\Str;
use DateInterval;
use DateTime;

class UpdateRefreshTokenKeyService
{
    public function execute(UpdateRefreshTokenKeyRequest $request)
    {
        $current_time = new DateTime();
        $user = $request->getUser();
        $user->refresh_token_key = Str::random(32);
        $user->refresh_token_key_validated_until = $current_time->add(new DateInterval("P1M"));
        $user->save();
    }
}
