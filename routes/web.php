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
Route::get('/danh-muc/{slug}-{id}', 'CategoryController@index')->name('category.index');
Route::get('/san-pham/{slug}-{id}', 'ProductDetailController@index')->name('get.product.detail');