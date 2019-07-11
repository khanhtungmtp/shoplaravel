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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/dang-xuat', 'Auth\LoginController@logout')->name('logout');
Route::get('/dang-ky', 'Auth\RegisterController@index')->name('get.register');
Route::post('/dang-ky', 'Auth\RegisterController@store')->name('store.register');
Route::get('/dang-nhap', 'Auth\LoginController@getLogin')->name('get.login');
Route::post('/dang-nhap', 'Auth\LoginController@postLogin')->name('post.login');

Route::group(['prefix' => 'danh-muc'], function ()
{
    Route::get('/{slug}-{id}', 'CategoryController@index')->name('category.index');
});

Route::group(['prefix' => 'ajax', 'middleware' => 'CheckLoginUserPay'], function ()
{
    Route::post('/danh-gia/{id}', 'RatingController@store')->name('store.rating.product');
});

Route::get('/san-pham/{slug}-{id}', 'ProductDetailController@index')->name('get.product.detail');

// gio hang
Route::get('/them-vao-gio/{id}', 'ShoppingCartController@addToCart')->name('add.cart');
Route::get('/gio-hang', 'ShoppingCartController@index')->name('cart.index');
Route::get('/xoa-san-pham-gio-hang/{key}', 'ShoppingCartController@delete')->name('cart.delete');

// thanh toan
Route::group(['prefix' => 'gio-hang', 'middleware' => 'CheckLoginUserPay'], function ()
{
    Route::get('/thanh-toan', 'ShoppingCartController@getFormCheckout')->name('get.pay.cart');
    Route::post('/thanh-toan', 'ShoppingCartController@saveInfoShoppingCart')->name('post.pay.cart');
});
// lien he
Route::get('/lien-he', 'ContactController@index')->name('contact');
Route::post('/lien-he', 'ContactController@store');