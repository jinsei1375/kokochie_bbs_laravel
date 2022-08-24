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

// Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/posts', 'PostController@index');
// Route::get('/posts/create','PostController@create');
// // Route::get('/posts/{id}', 'PostController@show');
// Route::post('/posts', 'PostController@store');
// Route::get('/posts/{id}', 'PostController@edit');
// Route::post('/posts/{id}', 'PostController@update');
// Route::delete('/posts/{id}','PostController@destroy');

Route::resource('/posts', 'PostController', ['except' => 'show']);
Route::resource('/user/posts', 'UserPostController', ['except' => 'show']);
