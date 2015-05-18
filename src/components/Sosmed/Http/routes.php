<?php

Route::group(['namespace' => 'Elearning\Sosmed\Http\Controllers'], function()
{
	Route::get('/', 'PostController@index');

	Route::post('posts', 'PostController@store');

	Route::get('status', 'PostController@status');
});