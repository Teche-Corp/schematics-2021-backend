<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use ReCaptcha\ReCaptcha;

class RecaptchaV3Verify
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $test = new ReCaptcha(env('RECAPTCHA_V3_KEY', ''));
        $resp = $test->setExpectedHostname($request->getHost())
                ->verify($request->input('_recaptcha_v3', ''), $request->getClientIp());

        if ($resp->isSuccess()) {
            return $next($request);
        }

        return response()->json(
            [
                'success' => false,
                'msg' => "Captcha verification failed.",
                'errcode' => 400,
            ], 400
        );
    }
}
