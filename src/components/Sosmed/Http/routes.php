<?php

Route::group(['namespace' => 'Elearning\Sosmed\Http\Controllers', 'middleware'=> ['auth']], function()
{
	Route::get('/', 'PostController@index');

	Route::post('posts', 'PostController@store');

	Route::get('status', 'PostController@status');
});