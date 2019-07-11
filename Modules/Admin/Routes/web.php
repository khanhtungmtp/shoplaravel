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

Route::prefix('admin')->group(function ()
{
    Route::get('/', 'AdminController@index')->name('admin.index');

    Route::group(['prefix' => 'category'], function ()
    {
        Route::get('/', 'AdminCategoryController@index')->name('admin.get.list.category');
        Route::get('/create', 'AdminCategoryController@create')->name('admin.get.create.category');
        Route::post('/create', 'AdminCategoryController@store')->name('admin.post.store.category');
        Route::get('/edit/{id}', 'AdminCategoryController@edit')->name('admin.get.edit.category');
        Route::post('/update/{id}', 'AdminCategoryController@update')->name('admin.post.update.category');
        Route::get('/{action}/{id}', 'AdminCategoryController@action')->name('admin.post.action.category');
    });

    Route::group(['prefix' => 'product'], function ()
    {
        Route::get('/', 'AdminProductController@index')->name('admin.get.list.product');
        Route::get('/create', 'AdminProductController@create')->name('admin.get.create.product');
        Route::post('/create', 'AdminProductController@store')->name('admin.post.store.product');
        Route::get('/edit/{id}', 'AdminProductController@edit')->name('admin.get.edit.product');
        Route::post('/update/{id}', 'AdminProductController@update')->name('admin.post.update.product');
        Route::get('/{action}/{id}', 'AdminProductController@action')->name('admin.post.action.product');
    });
    // quan ly user
    Route::group(['prefix' => 'user'], function ()
    {
        Route::get('/', 'AdminUserController@index')->name('admin.get.list.user');
//        Route::get('/create', 'AdminUserController@create')->name('admin.get.create.user');
//        Route::post('/create', 'AdminUserController@store')->name('admin.post.store.user');
//        Route::get('/edit/{id}', 'AdminUserController@edit')->name('admin.get.edit.user');
//        Route::post('/update/{id}', 'AdminUserController@update')->name('admin.post.update.user');
        Route::get('/{action}/{id}', 'AdminUserController@action')->name('admin.post.action.user');
    });
    // quan ly don hang
    Route::group(['prefix' => 'transaction'], function ()
    {
        Route::get('/', 'AdminTransactionController@index')->name('admin.get.list.transaction');
        Route::get('/show/{id}', 'AdminTransactionController@show')->name('admin.get.show.transaction');
        Route::get('/{action}/{id}', 'AdminTransactionController@action')->name('admin.post.action.transaction');
    });
    // quan ly danh gia rating
    Route::group(['prefix' => 'rating'], function ()
    {
        Route::get('/', 'AdminRatingController@index')->name('admin.get.list.rating');
        Route::get('/{action}/{id}', 'AdminRatingController@action')->name('admin.post.action.rating');
    });

});
