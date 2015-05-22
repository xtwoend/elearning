<?php 

if (! function_exists('flash')) {

	/**
	 * Set a flash message in the session.
	 *
	 * @param  string $message
	 * @return void
	 */
	function flash($message) {
	    session()->flash('message', $message);
	}
};