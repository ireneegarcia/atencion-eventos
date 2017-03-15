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

Route::get('/', function () {
    return view('index');
});
//todo list
Route::get('/', 'OperatorController@todoList');

//profile
Route::get('/profile', 'ApiAuthController@getProfile');

//USUARIOS
//clientes
/*Route::get('/clients', 'ApiAuthController@getProfile');

//servicios
Route::get('/services', 'ApiAuthController@getProfile');

//operadores
Route::get('/operators', 'ApiAuthController@getProfile');

//admin
Route::get('/admin', 'ApiAuthController@getProfile');*/


Route::get('/uploadfile', 'ApiAuthController@uploadPhoto');

Route::group(['middleware' =>'cors'], function () {

});
