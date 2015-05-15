<?php

Route::group(['prefix' => 'auth', 'namespace' => 'Elearning\Auth\Http\Controllers', 'middleware' => 'guest'], function()
{
	Route::get('/login', 'AuthController@index');
	Route::get('/register', 'AuthController@register');

});


Route::group(['prefix' => 'auth', 'namespace' => 'Elearning\Auth\Http\Controllers', 'middleware' => 'auth'], function()
{
	Route::get('/logout', 'AuthController@logout');

});

