<?php

use App\Http\Controllers\Admin\CandidateController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\PositionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SourceController;
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
    Route::get('/user/create', [UserController::class, 'create'])->name('admin.user.create');
	Route::post('/user/store', [UserController::class, 'store'])->name('admin.user.store');
	Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
	Route::post('/user/update/{id}', [UserController::class, 'update'])->name('admin.user.update');
	Route::delete('/user/destroy/{id}', [UserController::class, 'destroy'])->name('admin.user.destroy');

    // Department
	Route::get('/department', [DepartmentController::class, 'index'])->name('admin.department.index');
	Route::get('/department/create', [DepartmentController::class, 'create'])->name('admin.department.create');
	Route::post('/department/store', [DepartmentController::class, 'store'])->name('admin.department.store');
	Route::get('/department/edit/{id}', [DepartmentController::class, 'edit'])->name('admin.department.edit');
	Route::post('/department/update/{id}', [DepartmentController::class, 'update'])->name('admin.department.update');
	Route::delete('/department/destroy/{id}', [DepartmentController::class, 'destroy'])->name('admin.department.destroy');

    // Source
	Route::get('/source', [SourceController::class, 'index'])->name('admin.source.index');
	Route::get('/source/create', [SourceController::class, 'create'])->name('admin.source.create');
	Route::post('/source/store', [SourceController::class, 'store'])->name('admin.source.store');
	Route::get('/source/edit/{id}', [SourceController::class, 'edit'])->name('admin.source.edit');
	Route::post('/source/update/{id}', [SourceController::class, 'update'])->name('admin.source.update');
	Route::delete('/source/destroy/{id}', [SourceController::class, 'destroy'])->name('admin.source.destroy');

    // Position
	Route::get('/position', [PositionController::class, 'index'])->name('admin.position.index');
    Route::get('/position/create', [PositionController::class, 'create'])->name('admin.position.create');
	Route::post('/position/store', [PositionController::class, 'store'])->name('admin.position.store');
	Route::get('/position/edit/{id}', [PositionController::class, 'edit'])->name('admin.position.edit');
	Route::post('/position/update/{id}', [PositionController::class, 'update'])->name('admin.position.update');
	Route::delete('/position/destroy/{id}', [PositionController::class, 'destroy'])->name('admin.position.destroy');

    // Role
	Route::get('/role', [RoleController::class, 'index'])->name('admin.role.index');
    Route::get('/role/create', [RoleController::class, 'create'])->name('admin.role.create');
	Route::post('/role/store', [RoleController::class, 'store'])->name('admin.role.store');
	Route::get('/role/edit/{id}', [RoleController::class, 'edit'])->name('admin.role.edit');
	Route::post('/role/update/{id}', [RoleController::class, 'update'])->name('admin.role.update');
	Route::delete('/role/destroy/{id}', [RoleController::class, 'destroy'])->name('admin.role.destroy');

    // Candidate
	Route::get('/candidate', [CandidateController::class, 'index'])->name('admin.candidate.index');
    Route::get('/candidate/create', [CandidateController::class, 'create'])->name('admin.candidate.create');
	Route::post('/candidate/store', [CandidateController::class, 'store'])->name('admin.candidate.store');
	Route::get('/candidate/edit/{id}', [CandidateController::class, 'edit'])->name('admin.candidate.edit');
	Route::post('/candidate/update/{id}', [CandidateController::class, 'update'])->name('admin.candidate.update');
	Route::delete('/candidate/destroy/{id}', [CandidateController::class, 'destroy'])->name('admin.candidate.destroy');
    Route::post('/candidate/import-excel', [CandidateController::class, 'importExcel'])->name('admin.candidate.import_excel');
    Route::get('/candidate/export-excel', [CandidateController::class, 'exportExcel'])->name('admin.candidate.export_excel');

	//Auth
	Route::get('/logout', [LoginController::class, 'logout'])->name('auth.get.logout');
});
