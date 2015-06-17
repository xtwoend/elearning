<?php 

namespace Xtwoend\Component\Discuss;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class DiscussServiceProvider extends ServiceProvider
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

        require __DIR__ . '/Http/routes.php';
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