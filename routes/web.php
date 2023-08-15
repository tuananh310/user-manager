<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\PositionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
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
    Route::get('/', function ()
	{
		return redirect()->route('dashboard.index');
	});
	Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index');

    // User
	Route::get('/user', [UserController::class, 'index'])->name('admin.user.index');

    // Department
	Route::get('/department', [DepartmentController::class, 'index'])->name('admin.department.index');
	Route::get('/department/create', [DepartmentController::class, 'create'])->name('admin.department.create');
	Route::post('/department/store', [DepartmentController::class, 'store'])->name('admin.department.store');
	Route::get('/department/edit/{id}', [DepartmentController::class, 'edit'])->name('admin.department.edit');
	Route::post('/department/update/{id}', [DepartmentController::class, 'update'])->name('admin.department.update');
	Route::delete('/department/destroy/{id}', [DepartmentController::class, 'destroy'])->name('admin.department.delete');

    // Position
	Route::get('/position', [PositionController::class, 'index'])->name('admin.position.index');

    // Role
	Route::get('/role', [RoleController::class, 'index'])->name('admin.role.index');

	//Auth
	Route::get('/logout', [LoginController::class, 'logout'])->name('auth.get.logout');
});
