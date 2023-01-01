<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoggingAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        DB::table('logging_admin')
            ->insert([
                "route" => $request->path(),
                "request" => json_encode($request->input()),
                "email_admin" => Auth::user()->email
            ]);
        return $next($request);
    }
}
