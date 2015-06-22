<?php 

namespace Xtwoend\Component\Magazine;

 /**
 * FileName
 *
 * 
 *     
 * @version    0.1
 * @author     Abdul Hafidz Anshari
 * @license    BSD License (3-clause) 
 */

use Illuminate\Support\ServiceProvider;

class MagazineServiceProvider extends ServiceProvider
{
	
	/**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {   
        $this->publishes([
            __DIR__.'/resources/database/migrations' => base_path('database/migrations'),
        ], 'migration');   
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}