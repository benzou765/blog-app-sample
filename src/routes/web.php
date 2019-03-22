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

Route::get('/', "FrontBlogController@index");

Route::prefix('admin')->group(function() {
    Route::post('post', 'AdminBlogController@post');
    Route::get('form/{id?}', 'AdminBlogController@form');
    Route::post('delete', 'AdminBlogController@delete');
    Route::get('list', 'AdminBlogController@list');
});

Auth::routes();
