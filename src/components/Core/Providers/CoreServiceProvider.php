<?php namespace Elearning\Core\Providers;

use Illuminate\Support\ServiceProvider;
use Elearning\Core\Utils\Meta;

class CoreServiceProvider extends ServiceProvider {

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
		$loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('Meta', 'Elearning\Core\Facades\Meta');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{		
		$this->metaRegister();
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

	/**
	 * meta service.
	 *
	 * @return
	 */
	public function metaRegister()
	{
		$this->app->bindShared('meta',function($app)
        { 
            return new Meta;
        });
	}
}
