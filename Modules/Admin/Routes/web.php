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
    Route::get('/', 'AdminController@index');

    Route::group(['prefix' => 'category'], function ()
    {
        Route::get('/', 'AdminCategoryController@index')->name('admin.get.list.category');
        Route::get('/create', 'AdminCategoryController@create')->name('admin.get.create.category');
        Route::post('/create', 'AdminCategoryController@store')->name('admin.post.store.category');
        Route::get('/edit/{id}', 'AdminCategoryController@edit')->name('admin.get.edit.category');
        Route::post('/update/{id}', 'AdminCategoryController@update')->name('admin.post.update.category');
        Route::get('/{action}/{id}', 'AdminCategoryController@action')->name('admin.post.action.category');
    });
});