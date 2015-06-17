<?php 

namespace Xtwoend\Component\Calendar;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class CalendarServiceProvider extends ServiceProvider
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
            __DIR__.'/resources/views' => base_path('resources/views'),
        ], 'view');

       
        $this->loadViewsFrom(__DIR__ . '/resources/views/calendar', 'calendar');

        require __DIR__ . '/Http/routes.php';
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('fullcalendar', function ($app) {
            return $app->make(\Xtwoend\Component\Calendar\Calendar::class);
        });
    
        $aliases = [
            'Calendar' => \Xtwoend\Component\Calendar\Facades\Calendar::class,
        ];
        
        AliasLoader::getInstance($aliases)->register();
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['fullcalendar'];
    }

}