<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;

class BeforeDateMiddleware
{
	/**
	 * Handle an incoming request.
	 *
	 * @param Request $request
	 * @param Closure $next
	 * @param string $date_config
	 * @return mixed
	 */
	public function handle(Request $request, Closure $next, string $date_config)
	{
		$current_date = Carbon::now('Asia/Jakarta')->getTimestamp();
		$config_date = Carbon::createFromFormat('d/m/Y', config('event-dates.' . $date_config . '.date'), 'Asia/Jakarta')->startOfDay()->getTimestamp();

		if ($current_date <= $config_date) {
			return $next($request);
		}

		return response()->json(
			[
				'success' => false,
				'msg' => config('event-dates.' . $date_config . '.error'),
				'errcode' => 2000,
			],
			400
		);
	}
}
