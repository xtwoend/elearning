<?php 


return [

	/*
	|--------------------------------------------------------------------------
    | Themes 
    |--------------------------------------------------------------------------
	| 
	|
	|
	*/
	'themes' => 'default',

	/*
	| Social plugin login oauth
	| 
	*/
	'social' => 'facebook',
	
	/*
	|--------------------------------------------------------------------------
    | Component 
    |--------------------------------------------------------------------------
	| 
	|
	|
	*/
	'components' => [
		Xtwoend\Component\User\UserServiceProvider::class,
		Xtwoend\Component\Calendar\CalendarServiceProvider::class,
		Xtwoend\Component\Discuss\DiscussServiceProvider::class,
		Xtwoend\Component\Category\CategoryServiceProvider::class,
	],

	
];