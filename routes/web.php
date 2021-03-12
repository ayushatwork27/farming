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
		Route::get('usertrades_show', [App\Http\Controllers\User\UserTradeController::class, 'usertrades_show'])->name('user.usertrades_show');
		Route::get('trade_user_list', [App\Http\Controllers\User\UserTradeController::class, 'user_trade'])->name('user.trade_user_list');
		Route::post('user_tradedetail', [App\Http\Controllers\User\UserTradeController::class, 'user_tradedetail'])->name('user.user_tradedetail');
		Route::post('save_user_tradedetail', [App\Http\Controllers\User\UserTradeController::class, 'save_user_tradedetail'])->name('user.save_user_tradedetail');

		Route::get('trade_show/{id}', [App\Http\Controllers\User\UserTradeController::class, 'trade_show'])->name('user.trade_show');

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

		Route::get('index', [App\Http\Controllers\Admin\CropManagementController::class, 'index'])->name('admin.index');
		Route::get('indextrades', [App\Http\Controllers\Admin\TradeShowController::class, 'indextrades'])->name('admin.indextrades');

		Route::get('create', [App\Http\Controllers\Admin\CropManagementController::class, 'create'])->name('admin.create');

		Route::get('update/{crop_id}', [App\Http\Controllers\Admin\CropManagementController::class, 'update'])->name('admin.update');
		
		Route::post('store', [App\Http\Controllers\Admin\CropManagementController::class, 'store'])->name('admin.store');
		Route::get('status_update/{id}',[App\Http\Controllers\Admin\CropManagementController::class,'status_update'])->name('admin.status_update');

		Route::get('user_detail/{user_id}', [App\Http\Controllers\Admin\UserManagementController::class, 'user_detail'])->name('admin.user_detail');
		Route::get('download_image/{user_id}/{path}', [App\Http\Controllers\Admin\UserManagementController::class, 'download_image'])->name('admin.download_image');

		Route::get('update_user_status/{user_id}', [App\Http\Controllers\Admin\UserManagementController::class, 'update_user_status'])->name('admin.update_user_status');

	});
});
