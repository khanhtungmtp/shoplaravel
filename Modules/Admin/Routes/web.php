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
    Route::get('/', 'AdminController@index')->name('index');

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
    // quan ly don hang
    Route::group(['prefix' => 'transaction'], function ()
    {
        Route::get('/', 'AdminTransactionController@index')->name('admin.get.list.transaction');
        Route::get('/create', 'AdminTransactionController@create')->name('admin.get.create.transaction');
        Route::post('/create', 'AdminTransactionController@store')->name('admin.post.store.transaction');
        Route::get('/edit/{id}', 'AdminTransactionController@edit')->name('admin.get.edit.transaction');
        Route::post('/update/{id}', 'AdminTransactionController@update')->name('admin.post.update.transaction');
        Route::get('/{action}/{id}', 'AdminTransactionController@action')->name('admin.post.action.transaction');
    });
});
