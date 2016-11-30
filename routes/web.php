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

Route::get('/', function () {
    return view('welcome');
});

Route::get('uas/get', 'ContactController@get');
Route::get('uas/save/{name}/{number}/{email}', 'ContactController@add');
Route::get('uas/edit/{id}/{name}/{number}/{email}', 'ContactController@modify');
Route::get('uas/delete/{id}', 'ContactController@destroy' );

Route::post('uas/user/login', 'LoginController@login');
Route::post('uas/user/register', 'RegisterController@register');
