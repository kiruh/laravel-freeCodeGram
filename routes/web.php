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

Auth::routes();

// profile
Route::get('/profile/{user}', 'ProfileController@show')->name('profile.show');

// post
Route::get('/p/create', 'PostController@create')->name('post.create');
Route::post('/p', 'PostController@store')->name('post.store');
    