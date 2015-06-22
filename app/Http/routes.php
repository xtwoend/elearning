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

/**
 * Calendar modul
 */
Route::resource('calendar', 'CalendarController');

/**
 * Forum modul
 */
Route::post('forum/{slug}', 'Forum\ForumRepliesController@store');
Route::get('forum/mark_solved/{threadId}/{replyId}', 'Forum\ForumThreadsController@getMarkQuestionSolved');
Route::get('forum/mark_unsolved/{threadId}', 'Forum\ForumThreadsController@getMarkQuestionUnsolved');
Route::resource('forum', 'Forum\ForumThreadsController');
Route::resource('forum/reply', 'Forum\ForumRepliesController');
Route::get('api/v1/get_tread', 'Api\v1\ForumThreadsController@getThread');
Route::get('api/v1/get_tread_reply', 'Api\v1\ForumRepliesController@getReply');
Route::put('forum/thread/update', 'Forum\ForumThreadsController@update');

/**
 * PSB modul
 */
Route::resource('pendaftars', 'Psb\RegisterController');


get('/test', function() {
	for($i=1; $i<10000; $i++)
	{
		echo 'echo page render';
	}
});