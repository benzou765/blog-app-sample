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
Route::get('/admin/form', 'AdminBlogController@form');
Route::post('/admin/post', 'AdminBlogController@post');
Route::get('/admin/form/{id?}', 'AdminBlogController@form');
Route::post('/admin/delete', 'AdminBlogController@delete');
