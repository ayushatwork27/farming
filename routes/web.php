<?php

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

Route::get('/', function () {
    return view('website');
});

Auth::routes();

Route::get('/login', [App\Http\Controllers\Auth\UserLoginController::class, 'showLoginForm'])->name('user.login');
Route::post('/login', [App\Http\Controllers\Auth\UserLoginController::class, 'login'])->name('user.login.submit');



//Route::get('/dashboard', 'UserController@index')->name('user.dashboard');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('login',[App\Http\Controllers\UserLoginController::class, 'showLoginForm']  )->name('user.login');
//Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('user.login.submit');

Route::group(['prefix'=>'user'],function(){
	
	Route::group(['middleware'=>'auth'],function(){
		
		Route::get('dasboard', [App\Http\Controllers\User\DashboardController::class, 'dashboard_view'])->name('user.dashboard');

		Route::get('register', [App\Http\Controllers\User\UserDetailsController::class, 'user_register_form'])->name('user.register_form');

		Route::post('save_user_details', [App\Http\Controllers\User\UserDetailsController::class, 'save_user_details'])->name('user.save_user_details');

	});
});




Route::group(['prefix'=>'admin'],function(){

	Route::group(['middleware'=>'guest:admin'],function(){

		Route::get('login', [App\Http\Controllers\Auth\AdminLoginController::class, 'showLoginForm'])->name('admin.login');
		
		Route::post('login', [App\Http\Controllers\Auth\AdminLoginController::class, 'login'])->name('admin.login.submit');
		//Route::post('login', [App\Http\Controllers\AdminController::class, 'authenticate'])->name('admin.auth');

	});
	
	Route::group(['middleware'=>'auth:admin'],function(){
		
		Route::get('dasboard', [App\Http\Controllers\Admin\DashboardController::class, 'dashboard_view'])->name('admin.dashboard');
		Route::get('registered_user_list', [App\Http\Controllers\Admin\UserManagementController::class, 'registered_user_list'])->name('admin.registered_user_list');

		Route::get('user_detail/{user_id}', [App\Http\Controllers\Admin\UserManagementController::class, 'user_detail'])->name('admin.user_detail');

	});
});
