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



// PROFILES ========================================================================================================= //
Route::get('/users',                          [ 'as' => 'users.list',                   'uses' => 'UserProfileController@index'    ]);
Route::get('/{route}',                        [ 'as' => 'user.profile',                 'uses' => 'UserProfileController@profile'  ]);
Route::get('/{route}/edit',                   [ 'as' => 'user.profile.edit',            'uses' => 'UserProfileController@edit'     ]);
Route::get('/{route}/edit/route',             [ 'as' => 'user.profile.edit.url',        'uses' => 'UserProfileController@editUrl'  ]);


// AJAX ============================================================================================================= //
Route::post('/ajax/check-username',                [ 'as' => 'check-username',               'uses' => 'Auth\RegisterController@checkUsername' ]);
Route::post('/ajax/check-email',                   [ 'as' => 'check-email',               'uses' => 'Auth\RegisterController@checkEmail' ]);