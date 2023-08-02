<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Auth
Route::get('/login', [LoginController::class, 'login'])->name('auth.get.login');
Route::post('/login', [LoginController::class, 'store'])->name('auth.get.store');

Route::group(['middleware' => ['web', 'auth.login']], function ()
{
	Route::get('/', function ()
	{
		return response()->json([
			'message' => 'Hello ChicnChill'
		]);
	});
	//Auth
	Route::get('/logout', [LoginController::class, 'logout'])->name('auth.get.logout');
});