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
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');



Route::middleware('auth')->group(function () {
/* User Routes */
Route::get('/users/{user_id}/setTheme', 'Users\UserController@setTheme')->name('users.settheme');
Route::get('/user', 'Users\UserController@index')->name('user.profile');
Route::get('/user/profile', 'Users\UserController@profileData')->name('user.profileData');
/* Join Session Routes */

Route::get('/sessions/join', '\App\Http\Controllers\Resources\SessionController@join')->name('sessions.join');

/* Datatable Routes */
Route::get('/characters/datatable', 'Resources\CharacterController@userDatatable')->name('characters.userdt');
Route::get('/sessions/datatable', 'Resources\SessionController@userDatatable')->name('sessions.userdt');

/*Data Routes */
Route::get('/characters/data', 'Resources\CharacterController@userCharacters')->name('characters.user');
Route::get('/sessions/data', 'Resources\SessionController@userSessions')->name('sessions.user');

/*Session Routes*/
Route::get('/sessions/create', 'Resources\SessionController@create')->name('sessions.create');
Route::post('/sessions/store', 'Resources\SessionController@store')->name('sessions.store');
Route::get('/sessions/{session}/{user}/{character?}', 'Resources\SessionController@start')->name('sessions.start');
Route::get('/sessions', 'Resources\SessionController@index')->name('sessions.index');
/* Character Routes */
Route::get('/characters/create', 'Resources\CharacterController@create')->name('characters.create');
Route::get('/characters/edit/{id}', 'Resources\CharacterController@edit')->name('characters.edit');
Route::post('/characters/store', 'Resources\CharacterController@store')->name('characters.store');
Route::put('/characters/update', 'Resources\CharacterController@update')->name('characters.update');

Route::get('/characters', 'Resources\CharacterController@index')->name('characters.index');
});