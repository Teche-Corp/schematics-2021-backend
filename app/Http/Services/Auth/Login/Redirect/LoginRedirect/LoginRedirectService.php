<?php

namespace App\Http\Services\Auth\Login\Redirect\LoginRedirect;

use App\Models\VerifiedHostEnum;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\App;

class LoginRedirectService
{
    /**
	 * ! Kembalian bukan json, tapi view biasa atau redirect
	 */
    public function execute(LoginRedirectRequest $request)
    {
        if (App::environment('production')) {
            try {
                JWT::decode($request->getRefreshToken(), config("app.key"), array("HS256"));
            } catch (\Throwable $th) {
                return $this->toLogin($request->getRedirectTo());
            }
        }

        $url_parsed = parse_url($request->getRedirectTo());
        
        if (!array_key_exists('scheme', $url_parsed) || (App::environment('production') && $url_parsed['scheme'] != 'https')) {
            return $this->toLogin();
        }

        if (!array_key_exists('host', $url_parsed)) {
            return $this->toLogin();
        }

        $url_data = App::environment('production') ?
                    (VerifiedHostEnum::VERIFIED_URL_PROD[$url_parsed['host']] ?? null) :
                    (VerifiedHostEnum::VERIFIED_URL_DEV[$url_parsed['host']] ?? null);

        if (!$url_data) {
            return $this->toLogin();
        }

        $login_url = $url_parsed['scheme'] .'://'.$url_parsed['host'] . '/' . $url_data[0];

        $login_host = $url_parsed['host'];
        $redirect_url = null;
        if (array_key_exists('path', $url_parsed) && $url_data[0] != $url_parsed['path']) {
            $redirect_url = $url_parsed['scheme'] .'://'.$url_parsed['host'] . '/' . $url_parsed['path'];
        }

        if (array_key_exists('query', $url_parsed)) {
            $redirect_url .= '?' . $url_parsed['query'];
        }

        return view('api.auth.redirect.login', [
            'url' => compact('login_url', 'redirect_url', 'login_host'),
            'refresh_token' => $request->getRefreshToken(),
            'dashboard_signin_url' => App::environment('production') ?
                                    ('https://schematics.its.ac.id/dashboard/signin?redirect_to=' . urlencode($request->getRedirectTo())) :
                                    ('https://dashboard-schematics.vercel.app/signin?redirect_to=' . urlencode($request->getRedirectTo()))
        ]);
    }

    protected function toLogin(string|null $redirect_to=null)
    {
        $base_url = App::environment('production') ?
                    ('https://schematics.its.ac.id/dashboard/signin') :
                    ('https://dashboard-schematics.vercel.app/signin');

        
        if ($redirect_to) {
            $base_url .= '?redirect_to=' . urlencode($redirect_to);
        }

        return redirect($base_url);
    }
}