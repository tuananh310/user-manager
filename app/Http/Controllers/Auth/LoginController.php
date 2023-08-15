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
			'username'    => 'required',
			'password' => 'required',
		]);

		$remember = request('remember');

		if (! auth()->attempt(request(['username', 'password']), $remember)) {
			session()->flash('error', 'Incorrect account or password');

			return redirect()->back();
		}

		return redirect()->route('admin.dashboard.index');
	}

	public function logout()
	{
		auth()->logout();

		return redirect()->route('auth.get.login');
	}
}
