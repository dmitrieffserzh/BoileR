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

Route::get('/', 'MainController@index')->name('main');


// USERS
Route::get('users', 'UserController@index')->name('users');







// AJAX
Route::post('/ajax/check-username',                [ 'as' => 'check-username',               'uses' => 'Auth\RegisterController@checkUsername' ]);
Route::post('/ajax/check-email',                   [ 'as' => 'check-email',               'uses' => 'Auth\RegisterController@checkEmail' ]);