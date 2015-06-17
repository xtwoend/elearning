<?php 

namespace Xtwoend\Component\Category;


use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
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
        
        $this->publishes([
            __DIR__.'/config.php' => config_path('category.php')
        ], 'config');

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