<?php

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
Route::get('/', 'HomeController@index')->name('index');
Route::resource('/characters', 'Resources\CharacterController');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');


/* User Routes */
Route::get('/users/{user_id}/setTheme', 'Users\UserController@setTheme')->name('users.settheme');
Route::get('/user', 'Users\UserController@index')->name('user.profile');
