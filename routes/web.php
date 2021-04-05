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
		
		Route::get('dashboard', [App\Http\Controllers\User\DashboardController::class, 'dashboard_view'])->name('user.dashboard');

		Route::get('register', [App\Http\Controllers\User\UserDetailsController::class, 'user_register_form'])->name('user.register_form');

		Route::get('usertrades_show', [App\Http\Controllers\User\UserTradeController::class, 'usertrades_show'])->name('user.usertrades_show');

		Route::get('trade_index', [App\Http\Controllers\User\UserTradeController::class, 'index'])->name('user.trade.index');

		Route::get('trade_create', [App\Http\Controllers\User\UserTradeController::class, 'create'])->name('user.trade.create');

		Route::post('trade_store_session', [App\Http\Controllers\User\UserTradeController::class, 'storeInSession'])->name('user.trade.store.session');

		Route::post('trade_store', [App\Http\Controllers\User\UserTradeController::class, 'store'])->name('user.trade.store');
		
		// Route::get('user/post', [App\Http\Controllers\User\UserTradeController::class, 'usertrades_show'])->name('user.post');

		Route::get('trade_detailt/{trade_id}', [App\Http\Controllers\User\UserTradeController::class, 'show'])->name('user.trade.detail');

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
		
		Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'dashboard_view'])->name('admin.dashboard');
		Route::get('registered_user_list', [App\Http\Controllers\Admin\UserManagementController::class, 'registered_user_list'])->name('admin.registered_user_list');

		Route::get('index', [App\Http\Controllers\Admin\CropManagementController::class, 'index'])->name('admin.index');

		Route::get('create', [App\Http\Controllers\Admin\CropManagementController::class, 'create'])->name('admin.create');

		Route::get('update/{crop_id}', [App\Http\Controllers\Admin\CropManagementController::class, 'update'])->name('admin.update');
		
		Route::post('store', [App\Http\Controllers\Admin\CropManagementController::class, 'store'])->name('admin.store');
		
		Route::get('status_update/{id}',[App\Http\Controllers\Admin\CropManagementController::class,'status_update'])->name('admin.status_update');

		Route::get('user_detail/{user_id}', [App\Http\Controllers\Admin\UserManagementController::class, 'user_detail'])->name('admin.user_detail');
		Route::get('download_image/{user_id}/{path}', [App\Http\Controllers\Admin\UserManagementController::class, 'download_image'])->name('admin.download_image');

		Route::get('update_user_status/{user_id}', [App\Http\Controllers\Admin\UserManagementController::class, 'update_user_status'])->name('admin.update_user_status');
		Route::get('update_crop_status/{id}', [App\Http\Controllers\Admin\CropManagementController::class, 'update_crop_status'])->name('admin.update_crop_status');

		Route::get('trade_index', [App\Http\Controllers\Admin\TradeController::class, 'index'])->name('admin.trade.list');
		Route::get('trade_detail/{trade_id}', [App\Http\Controllers\Admin\TradeController::class, 'show'])->name('admin.trade.detail');
		Route::post('trade_approve', [App\Http\Controllers\Admin\TradeController::class, 'trade_approve'])->name('admin.trade.approve');
		Route::post('status_change', [App\Http\Controllers\Admin\TradeController::class, 'status_change'])->name('admin.trade.status_change');
		Route::post('add_payment', [App\Http\Controllers\Admin\TradeController::class, 'add_payment'])->name('admin.trade.add_payment');

		Route::get('category_index', [App\Http\Controllers\Admin\AddcategoryController::class, 'category_index'])->name('admin.category_index');

		Route::get('create_category', [App\Http\Controllers\Admin\AddcategoryController::class, 'create_category'])->name('admin.create_category');
		Route::post('category_store', [App\Http\Controllers\Admin\AddcategoryController::class, 'category_store'])->name('admin.category_store');
		Route::get('admin.category_update/{category_id}', [App\Http\Controllers\Admin\AddcategoryController::class, 'category_update'])->name('admin.category_update');
	});
});
