<?php

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
    return view('welcome');
});

Route::get('index',[
	'as'=>'trang-chu',
	'uses'=>'PageController@getIndex'
]);

Route::get('loai-san-pham/{type}',[
	'as'=>'loaisanpham',
	'uses'=>'PageController@getLoaiSp'
]);

Route::get('chi-tiet-san-pham/{id}',[
	'as'=>'chitietsanpham',
	'uses'=>'PageController@getChitiet'
]);

Route::get('lien-he',[
	'as'=>'lienhe',
	'uses'=>'PageController@getLienHe'
]);

Route::get('gioi-thieu',[
	'as'=>'gioithieu',
	'uses'=>'PageController@getGioiThieu'
]);

Route::get('add-to-cart/{id}',[
	'as'=>'themgiohang',
	'uses'=>'PageController@getAddtoCart'
]);

Route::get('del-cart/{id}',[
	'as'=>'xoagiohang',
	'uses'=>'PageController@getDelItemCart'
]);
Route::get('dat-hang',[
	'as'=>'dathang',
	'uses'=>'PageController@getCheckout'
]);

Route::post('dat-hang',[
	'as'=>'dathang',
	'uses'=>'PageController@postCheckout'
]);

Route::get('dang-nhap',[
	'as'=>'login',
	'uses'=>'PageController@getLogin'
]);
Route::post('dang-nhap',[
	'as'=>'login',
	'uses'=>'PageController@postLogin'
]);

Route::get('dang-ki',[
	'as'=>'signin',
	'uses'=>'PageController@getSignin'
]);

Route::post('dang-ki',[
	'as'=>'signin',
	'uses'=>'PageController@postSignin'
]);

Route::get('dang-xuat',[
	'as'=>'logout',
	'uses'=>'PageController@postLogout'
]);

//route for admin
Route::group(['namespace' => '\App\Http\Controllers\admin'], function () {
	Route::get('admin/login', [
    	'as' => 'admin.login',
    	'uses' => 'AdminAuthController@getLogin'
    ]);
    Route::post('admin/login', [
    	'as' => 'admin.login',
    	'uses' => 'AdminAuthController@postLogin'
    ]);
    // Route::group(['prefix' => config('core.base.general.admin_dir'), 'middleware' => 'auth'], function () {
	Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
	    Route::get('/', [
	    	'as' => 'admin',
	    	'uses' => 'AdminController@getIndex'
	    ]);
	    Route::get('/products', [
	    	'as' => 'admin.products.list',
	    	'uses' => 'AdminController@getListProduct'
	    ]);
	    Route::get('/customers', [
	    	'as' => 'admin.customers.list',
	    	'uses' => 'AdminController@getListCustomer'
	    ]);
	    Route::get('/product-categories', [
	    	'as' => 'admin.products.cat',
	    	'uses' => 'AdminController@getListProductType'
	    ]);
	    Route::get('/users', [
	    	'as' => 'admin.users.list',
	    	'uses' => 'AdminController@getListUser'
	    ]);
	    Route::get('/bills', [
	    	'as' => 'admin.bills.list',
	    	'uses' => 'AdminController@getListBill'
	    ]);
	});
});