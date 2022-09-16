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


Route::post('posts/{post}/favorites', 'FavoriteController@store')->name('favorites');
Route::post('posts/{post}/unfavorites', 'FavoriteController@destroy')->name('unfavorites');

Route::resource('/comments', 'CommentController'); 


//ログイン中のユーザーのみアクセス可能
Route::group(['middleware' => ['auth']], function () {

  Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
    Route::resource('posts', 'UserPostController');
  });
  
    // アイコン
    Route::resource('/icon', 'IconController', ['only' => ['store', 'update', 'edit']]);

    Route::post('ajaxlike', 'PostController@ajaxlike')->name('posts.ajaxlike');
});
