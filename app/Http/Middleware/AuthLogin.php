<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 18/07/2023
 * Time: 20:28
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthLogin
{
	public function handle(Request $request, Closure $next)
	{
		if (!Auth::check()) {
			return  redirect()->route('auth.get.login');
		}
		return $next($request);
	}
}
