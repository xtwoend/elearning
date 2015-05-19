<?php namespace Elearning\User\Providers;

use Illuminate\Support\ServiceProvider;
use Caffeinated\Menus\Facades\Menu;

class UserServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * boot loader.
	 *
	 * @return
	 */
	public function boot()
	{	
		//administrator menu
      	$menu = Menu::get('administrator');
		$menu->add('Users', 'users')->icon('users');

		
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{		
		$this->registerConfig();
	}

	/**
	 * Register config.
	 * 
	 * @return void
	 */
	protected function registerConfig()
	{
		$this->publishes([
		    __DIR__.'/../Config/config.php' => config_path('user.php'),
		]);
		$this->mergeConfigFrom(
		    __DIR__.'/../Config/config.php', 'user'
		);
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
