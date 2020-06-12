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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/post/create', 'PostController@create');
Route::get('/post/{post}', 'PostController@show');

Route::post('/post', 'PostController@store');

Route::get('/profile/edit', 'ProfileController@edit')->name('profile.edit');
Route::patch('/profile/update', 'ProfileController@update')->name('profile.update');
Route::get('/profile/{user}', 'ProfileController@show')->name('profile.show');

