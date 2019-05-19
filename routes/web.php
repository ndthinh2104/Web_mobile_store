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
    return redirect()->route('trang-chu');
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
Route::get('tim-kiem', [
	'as' => 'search',
	'uses' => 'PageController@getSearch'

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
	Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
	    Route::get('/', [
	    	'as' => 'admin',
	    	'uses' => 'AdminController@getIndex'
	    ]);
	    Route::get('/products/edit/{id}', [
	    	'as' => 'admin.products.edit',
	    	'uses' => 'AdminProductsController@getEditProduct'
	    ]);
	    Route::get('/products/create', [
	    	'as' => 'admin.products.create',
	    	'uses' => 'AdminProductsController@getCreateProduct'
	    ]);
	    Route::post('/products/edit/{id}', [
	    	'as' => 'admin.products.edit',
	    	'uses' => 'AdminProductsController@postEditProduct'
	    ]);
	    Route::post('/products/create', [
	    	'as' => 'admin.products.create',
	    	'uses' => 'AdminProductsController@postCreateProduct'
	    ]);
	    Route::get('/products/delete/{id}', [
            'as' => 'admin.products.delete',
            'uses' => 'AdminProductsController@getDeleteProduct',
        ]);
	    Route::get('/products', [
	    	'as' => 'admin.products.list',
	    	'uses' => 'AdminProductsController@getListProduct'
	    ]);
	    Route::get('/customers', [
	    	'as' => 'admin.customers.list',
	    	'uses' => 'AdminCustomersController@getListCustomer'
	    ]);
	    Route::get('/products-categories/create', [
	    	'as' => 'admin.products.cat.create',
	    	'uses' => 'AdminProductsController@getCreateProductType'
	    ]);
	    Route::get('/product-categories', [
	    	'as' => 'admin.products.cat',
	    	'uses' => 'AdminProductsController@getListProductType'
	    ]);
	    Route::get('/products-categories/edit/{id}', [
	    	'as' => 'admin.products.cat.edit',
	    	'uses' => 'AdminProductsController@getEditProductType'
	    ]);
	    Route::post('/products-categories/edit/{id}', [
	    	'as' => 'admin.products.cat.edit',
	    	'uses' => 'AdminProductsController@postEditProductType'
	    ]);
	    Route::post('/products-categories/create', [
	    	'as' => 'admin.products.cat.create',
	    	'uses' => 'AdminProductsController@postCreateProductType'
	    ]);
	    Route::get('/products-categories/delete/{id}', [
            'as' => 'admin.products.cat.delete',
            'uses' => 'AdminProductsController@getDeleteProductType',
        ]);
	    Route::get('/users', [
	    	'as' => 'admin.users.list',
	    	'uses' => 'AdminUsersController@getListUser'
	    ]);
	    Route::get('/users/create', [
	    	'as' => 'admin.users.create',
	    	'uses' => 'AdminUsersController@getCreateUser'
	    ]);
	    Route::get('/users/edit/{id}', [
	    	'as' => 'admin.users.edit',
	    	'uses' => 'AdminUsersController@getEditUser'
	    ]);
	    Route::post('/users/edit/{id}', [
	    	'as' => 'admin.users.edit',
	    	'uses' => 'AdminUsersController@postEditUser'
	    ]);
	    Route::post('/users/create', [
	    	'as' => 'admin.users.create',
	    	'uses' => 'AdminUsersController@postCreateUser'
	    ]);
	    Route::get('/users/delete/{id}', [
            'as' => 'admin.users.delete',
            'uses' => 'AdminUsersController@getDeleteUser'
        ]);
	    Route::get('/bills', [
	    	'as' => 'admin.bills.list',
	    	'uses' => 'AdminController@getListBill'
	    ]);
	});
});