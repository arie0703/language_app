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

    Route::get('/post/edit', 'App\Http\Controllers\PostController@edit')->name('posts.edit');
    Route::post('/post/edit', 'App\Http\Controllers\PostController@update')->name('posts.update');

    Route::get('/post/delete', 'App\Http\Controllers\PostController@delete')->name('posts.delete');
    Route::post('/post/remove', 'App\Http\Controllers\PostController@remove')->name('posts.remove');

    Route::get('/user/edit', 'App\Http\Controllers\UserController@edit')->name('user.edit');
    Route::post('/user/edit', 'App\Http\Controllers\UserController@update')->name('user.update');

    Route::resource('user', 'App\Http\Controllers\UserController');


    Route::get('/', 'App\Http\Controllers\PostController@index')->name('/');

    //Language Timeline
    Route::get('/english', 'App\Http\Controllers\PostController@English');
    Route::get('/french', 'App\Http\Controllers\PostController@French');
    Route::get('/german', 'App\Http\Controllers\PostController@German');
    Route::get('/spanish', 'App\Http\Controllers\PostController@Spanish');
    Route::get('/portuguese', 'App\Http\Controllers\PostController@Portuguese');
    Route::get('/russian', 'App\Http\Controllers\PostController@Russian');
    Route::get('/japanese', 'App\Http\Controllers\PostController@Japanese');
    Route::get('/chinese', 'App\Http\Controllers\PostController@Chinese');
    Route::get('/korean', 'App\Http\Controllers\PostController@Korean');

});

Auth::routes();


