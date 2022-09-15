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

Route::get('/', 'PostController@index');

Auth::routes();

Auth::routes();

Route::resource('/posts', 'PostController', ['only' => 'index']);

Route::group(['prefix' => 'user', 'as' => 'user.', 'middleware' => 'auth'], function () {
  Route::resource('posts', 'UserPostController');
});

Route::post('posts/{post}/favorites', 'FavoriteController@store')->name('favorites');
Route::post('posts/{post}/unfavorites', 'FavoriteController@destroy')->name('unfavorites');

Route::resource('/comments', 'CommentController'); 

// アイコン
Route::resource('/icon', 'IconController', ['only' => ['store', 'update', 'edit']]);

//ログイン中のユーザーのみアクセス可能
Route::group(['middleware' => ['auth']], function () {
    //「ajaxlike.jsファイルのurl:'ルーティング'」に書くものと合わせる。
    Route::post('ajaxlike', 'PostController@ajaxlike')->name('posts.ajaxlike');
});
