<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'cors'], function () {


    // Auth
    Route::post('/login', 'ApiAuthController@userAuth');
    Route::post('/register', 'ApiAuthController@register');
    Route::post('/valid_register', 'ApiAuthController@validRegister');
    Route::post('/forgot_password', 'ApiAuthController@forgotPassword');
    Route::post('/change_password', 'ApiAuthController@changePassword')->middleware('jwt.auth');

    // Profile
    Route::post('/save_photo', 'ApiAuthController@savePhoto');

    // Accounts
    Route::post('/save_photo', 'ApiAuthController@savePhoto');

    // Home del api
    Route::get('/accounts/byCI/{ci}', 'AccountController@byCI');
    Route::get('/accounts/byEmail/{email}', 'AccountController@byEmail');
    Route::get('/version', 'HomeController@getVersion');

});

//Route::get('/drivers', 'DriversController@getAllDrivers')->middleware('jwt.auth');