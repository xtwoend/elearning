<?php namespace Elearning\Sosmed\Providers;

use Illuminate\Support\ServiceProvider;
use Caffeinated\Menus\Facades\Menu;

class SosmedServiceProvider extends ServiceProvider {

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
		$menu = Menu::get('main');
		$menu->add('Home', '')->icon('home');
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
		    __DIR__.'/../Config/config.php' => config_path('sosmed.php'),
		]);
		$this->mergeConfigFrom(
		    __DIR__.'/../Config/config.php', 'sosmed'
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
