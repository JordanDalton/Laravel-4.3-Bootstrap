<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', [
    'as'   => 'home',
    'uses' => 'HomeController@index'
]);

/*
 * User Authentication
 */
Route::group(['namespace' => 'Auth'], function()
{
    /*
     * Login
     */
    Route::get('login', [
        'as'   => 'login',
        'uses' => 'AuthController@getLogin'
    ]);

    Route::post('login', [
        'as'   => 'login',
        'uses' => 'AuthController@postLogin'
    ]);

    /*
     * Login
     */
    Route::get('logout', [
        'as'   => 'logout',
        'uses' => 'AuthController@getLogout'
    ]);

    /*
     * Password Reminder
     */
    // Route::controller('password', 'RemindersController');

    /*
     * Register
     */
    Route::get('register', [
        'as'   => 'register',
        'uses' => 'AuthController@getRegister'
    ]);

    Route::post('register', [
        'as'   => 'register',
        'uses' => 'AuthController@postRegister'
    ]);

    Route::get('reset/{token}', [
        'as'   => 'reset',
        'uses' => 'RemindersController@getReset'
    ]);

    Route::post('reset/{token}', [
        'as'   => 'reset',
        'uses' => 'RemindersController@postReset'
    ]);

    Route::get('remind', [
        'as'   => 'remind',
        'uses' => 'RemindersController@getRemind'
    ]);

    Route::post('remind', [
        'as'   => 'remind',
        'uses' => 'RemindersController@postRemind'
    ]);
});