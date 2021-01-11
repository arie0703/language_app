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

    Route::get('/post/create', 'App\Http\Controllers\PostController@showCreateForm')->name('posts.create');
    Route::post('/post/create', 'App\Http\Controllers\PostController@create');

    Route::get('/post/edit', 'App\Http\Controllers\PostController@edit')->name('posts.edit');
    Route::post('/post/edit', 'App\Http\Controllers\PostController@update')->name('posts.update');
    Route::patch('/post/edit', 'App\Http\Controllers\PostController@update')->name('posts.update');

    Route::get('/post/delete', 'App\Http\Controllers\PostController@delete')->name('posts.delete');
    Route::post('/post/remove/{id}', 'App\Http\Controllers\PostController@remove')->name('posts.remove');

    Route::get('/user/show', 'App\Http\Controllers\UserController@show')->name('user.page');
    Route::get('/user/edit', 'App\Http\Controllers\UserController@edit')->name('user.edit');
    Route::post('/user/edit', 'App\Http\Controllers\UserController@update')->name('user.update');

    Route::resource('user', 'App\Http\Controllers\UserController');
    
    Route::get('/rooms/index', 'App\Http\Controllers\RoomController@show');
    Route::get('/rooms/show/{id}', 'App\Http\Controllers\RoomController@show')->name('room.show');
    Route::post('/rooms/create', 'App\Http\Controllers\RoomController@create')->name('room.create');;
    //Route::resource('room', 'App\Http\Controllers\RoomController');
    //Route::resource('post', 'App\Http\Controllers\PostController');

    Route::post('/message/create', 'App\Http\Controllers\MessageController@create')->name('message.create');
    

    //json
    Route::get('/ajax/users', 'App\Http\Controllers\UserController@getUsers');
    Route::get('/ajax_user', 'App\Http\Controllers\UserController@getCurrentUser');
    Route::get('/ajax', 'App\Http\Controllers\TalkController@getData');
    Route::get('/messages/{roomid}', 'App\Http\Controllers\MessageController@getMessages');
    Route::get('/search/{user}','App\Http\Controllers\UserController@getUsers');
    Route::get('/search','App\Http\Controllers\UserController@getUsers2'); //旧版

    // talks
    Route::get('/talk/create', 'App\Http\Controllers\TalkController@index')->name('talks.create');
    Route::post('/talk/create', 'App\Http\Controllers\TalkController@create');

    Route::get('/talk/edit', 'App\Http\Controllers\TalkController@edit')->name('talks.edit');
    Route::post('/talk/edit', 'App\Http\Controllers\TalkController@update')->name('talks.update');
    Route::patch('/talk/edit', 'App\Http\Controllers\TalkController@update')->name('talks.update');

    Route::get('/talk/delete', 'App\Http\Controllers\TalkController@delete')->name('talks.delete');
    Route::post('/talk/remove/{id}', 'App\Http\Controllers\TalkController@remove')->name('talks.remove');

    Route::get('/talk/search_user', 'App\Http\Controllers\UserController@search');
    Route::get('/mypost', 'App\Http\Controllers\PostController@index')->name('/mypost');

    Route::get('talk', 'App\Http\Controllers\TalkController@index')->name('talk');
    Route::get('/talk/show/{id}', 'App\Http\Controllers\TalkController@show');

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

Route::get('/', 'App\Http\Controllers\HomeController@index');
Route::get('/login/guest', 'App\Http\Controllers\Auth\LoginController@guestLogin');
Auth::routes();


