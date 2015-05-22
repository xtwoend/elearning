<?php

Route::controllers([
	'auth' => 'Elearning\User\Http\Controllers\AuthController',
	'password' => 'Elearning\User\Http\Controllers\PasswordController',
]);

Route::get('register/confirm/{token}', 'Elearning\User\Http\Controllers\AuthController@confirmEmail');