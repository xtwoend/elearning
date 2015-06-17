<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

Route::resource('calendar', 'CalendarController');

Route::resource('forum', 'Forum\ForumThreadsController');
Route::post('forum/{slug}', 'Forum\ForumRepliesController@store');


get('/test', function() {
	for($i=1; $i<10000; $i++)
	{
		echo 'echo page render';
	}
});