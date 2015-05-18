<?php namespace Elearning\User\Http\Controllers;

use Elearning\Core\Routing\Controller;

class UserController extends Controller {
	
	public function index()
	{
		return view('user::index');
	}
	
}