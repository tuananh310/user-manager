<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Customer\CustomerController;
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
Route::get('/', function ()
	{
		return redirect()->route('info.get');
	});
// Form Info
Route::get('/ThailandMartech2023', [CustomerController::class, 'index'])->name('info.get');
Route::post('/customer-store', [CustomerController::class, 'store'])->name('customer.store');

//Auth
Route::get('/login', [LoginController::class, 'login'])->name('auth.get.login');
Route::post('/login', [LoginController::class, 'store'])->name('auth.get.store');

Route::group(['middleware' => ['web', 'auth.login']], function ()
{
	Route::get('/list', [CustomerController::class, 'list'])->name('customer.list');
	Route::get('/export', [CustomerController::class, 'export'])->name('customer.export');
	//Auth
	Route::get('/logout', [LoginController::class, 'logout'])->name('auth.get.logout');
});
