<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 18/07/2023
 * Time: 20:08
 */

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class LoginController extends Controller
{
	public function login()
	{
		return view('auth.login');
	}

	public function store()
	{
		$this->validate(request(), [
			'email'    => 'required|email',
			'password' => 'required',
		]);

		$remember = request('remember');

		if (! auth()->attempt(request(['email', 'password']), $remember)) {
			session()->flash('error', 'Incorrect account or password');

			return redirect()->back();
		}

		return redirect()->route('customer.list');
	}

	public function logout()
	{
		auth()->logout();

		return redirect()->route('auth.get.login');
	}
}
