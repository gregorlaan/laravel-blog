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

Route::redirect('/', '/profile');

Route::post('/follow/{user}', 'FollowController@store');

Route::get('/post/create', 'PostController@create');
Route::get('/post/{post}', 'PostController@show');

Route::post('/post', 'PostController@store');

Route::get('/profile/edit', 'ProfileController@edit')->name('profile.edit')->middleware('auth');
Route::patch('/profile/update', 'ProfileController@update')->name('profile.update')->middleware('auth');
Route::get('/profile/{user}', 'ProfileController@show')->name('profile.show');
Route::get('/profile', 'ProfileController@showMyProfile')->name('profile.showMyProfile')->middleware('auth');

