<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/login', function () {
    return view('login');
});


Route::get('/mapvector', function () {
    return view('mapvector');
});

Route::get('/mapgoogle', function () {
    return view('mapgoogle');
});


Route::get('/forgotPassword', function () {
    return view('forgotPassword');
});

Route::get('/changePassword', function () {
    return view('changePassword');
});


//todo list
Route::get('/', 'OperatorController@index');

//profile
Route::get('/profile', 'OperatorController@getProfile');

//Register
Route::get('/signup/{role}', 'OperatorController@getSignup');

//USUARIOS
//clientes
Route::get('/clients', 'OperatorController@getClients');

//servicios
Route::get('/services', 'OperatorController@getServices');

//operadores
Route::get('/operators', 'OperatorController@getOperators');

//admin
Route::get('/admin', 'OperatorController@getAdmin');


Route::get('/uploadfile', 'ApiAuthController@uploadPhoto');

Route::group(['middleware' =>'cors'], function () {

});
