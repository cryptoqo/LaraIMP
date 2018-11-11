<?php

namespace Zabanya\LaraImp;

use Illuminate\Support\ServiceProvider;
use Zabanya\LaraImp\LaraImp;

class LaraImpServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/views', 'laraimp');

        $this->publishes([
            __DIR__.'/config/config.php' => config_path('laraimp.php'),
        ], 'config');

        $this->publishes([
            __DIR__.'/views' => base_path('resources/views/vendor/laraimp'),
        ], 'views');

        $this->app['view']->creator(
            ['laraimp::script'],
            'Zabanya\LaraImp\ScriptViewCreator'
        );
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        include __DIR__.'/routes.php';
        $this->app->make('Zabanya\LaraImp\LaraImpController');

        $this->mergeConfigFrom(__DIR__.'/config/config.php', 'laraimp');
        $laraimp = new LaraImp(config('laraimp'));
        if (config('laraimp.enabled') === false) {
            $laraimp->disable();
        }
        $this->app->instance('Zabanya\LaraImp\LaraImp', $laraimp);
        $this->app->alias('Zabanya\LaraImp\LaraImp', 'laraimp');
    }
}
