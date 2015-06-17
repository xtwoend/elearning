<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

class ElearningServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerComponents();
        $this->registerHtml();
    }

    /**
     * Register components services.
     *
     * @return void
     */
    public function registerComponents()
    {
        foreach ($this->app['config']->get('elearning.components',[]) as $component) {
            $this->app->register($component);
        }
    }

    /**
     * Register laravel html package.
     *
     * @return void
     */
    protected function registerHtml()
    {
        $this->app->register(\Collective\Html\HtmlServiceProvider::class);

        $aliases = [
            'HTML' => \Collective\Html\HtmlFacade::class,
            'Form' => \Collective\Html\FormFacade::class,
        ];

        AliasLoader::getInstance($aliases)->register();
    }

}
