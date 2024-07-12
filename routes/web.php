<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\LoginController;
use \App\Http\Controllers\MainController;
use \App\Http\Controllers\MainAdminController;
use \App\Http\Middleware\Authenticate;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\MotelController;
use \App\Http\Controllers\ProfileController;
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

Route::get('login/login', [LoginController::class, 'index'])->name('login');
Route::get('login/register', [LoginController::class, 'register'])->name('register');
Route::post('login/login/store', [LoginController::class, 'store'])->name('store');
Route::post('login/register/create', [LoginController::class, 'create'])->name('create');
Route::middleware(['auth'])->group(function()
{
	Route::get('/', [MainController::class, 'index'])->name('home');
	Route::post('/', [LoginController::class, 'logout'])->name('logout');
	Route::get('/search', 'App\Http\Controllers\MainController@search')->name('search');
	Route::get('/admin', [MainAdminController::class, 'index'])->name('dashboard');
	Route::get('/detail/{id}', [MainController::class, 'detail'])->name('detail');
	Route::prefix('admin')->group(function()
	{
		Route::resource('admin_users', UserController::class);
		Route::resource('motels', MotelController::class);
		Route::post('motel/duyet/{id}',[MotelController::class,'duyet'])->name('duyet');
		Route::post('motel/approve/{id}',[MotelController::class,'approve'])->name('approve');
		Route::get('admin_users/reset/{id}', [UserController::class, 'reset'])->name('reset');
		Route::PATCH('admin_users/reset/{id}/updatepass', [UserController::class, 'updatepass'])->name('updatepass');
	});
	Route::prefix('user')->group(function()
	{
		Route::resource('profile', ProfileController::class);
		Route::get('/profile/password/{id}',[ProfileController::class,'password'])->name('password');
		Route::post('/profile/password/{id}',[ProfileController::class,'reset'])->name('reset');
		Route::resource('motels', MotelController::class);

	});
	Route::post('detail/baocao/{id}',[MainController::class,'baocao'])->name('baocao');
});