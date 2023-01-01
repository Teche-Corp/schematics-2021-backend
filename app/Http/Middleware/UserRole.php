<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserRole
{
    /**
     * Handle an incoming request.
     * ! User harus lewat middleware auth terlebih dahulu !
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        $user = Auth::user();
        if ($user->user_role != $role) {
            return response()->json([
                'success' => false,
                'msg' => "Forbidden",
                'errcode' => 403
            ], 403);
        }

        return $next($request);
    }
}
