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
    return view('welcome');
});

Route::namespace('backend')->prefix('backend')->group(function(){
    Route::get('/','DashboardController@index')->name('backend.dashboard.index');
    Route::get('product','ProductController@index')->name('backend.product.index');
    Route::get('category','CategoryController@index')->name('backend.category.index');
    Route::get('news','NewsController@index')->name('backend.news.index');
    Route::get('user','UserController@index')->name('backend.user.index');
});