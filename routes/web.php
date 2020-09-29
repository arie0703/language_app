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

Route::group(['middleware' => 'auth'], function() {

    Route::get('/post', 'App\Http\Controllers\PostController@showCreateForm')->name('posts.create');
    Route::post('/post', 'App\Http\Controllers\PostController@create');

    Route::get('/', 'App\Http\Controllers\PostController@index')->name('/');
    Route::get('/english', 'App\Http\Controllers\PostController@English');

});

Auth::routes();


