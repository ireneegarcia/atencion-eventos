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
    Route::post('/add_condition', 'OperatorController@add_condition');
    Route::post('/my_condition', 'OperatorController@my_condition');
    Route::post('/add_contact', 'OperatorController@add_contact');
    Route::post('/my_contact', 'OperatorController@my_contact');

    // Accounts
    Route::post('/save_photo', 'ApiAuthController@savePhoto');
    Route::post('/delete_photo', 'OperatorController@deletePhoto');

    // Home del api
    Route::get('/accounts/byCI/{ci}', 'AccountController@byCI');
    Route::get('/accounts/byEmail/{email}', 'AccountController@byEmail');
    Route::get('/version', 'HomeController@getVersion');

    //OperatorController
    //to do
    Route::post('/storeTodo', 'OperatorController@storeTodo');
    Route::post('/doneTodo', 'OperatorController@doneTodo');


});

//Route::get('/drivers', 'DriversController@getAllDrivers')->middleware('jwt.auth');