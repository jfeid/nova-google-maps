<?php

namespace Jfeid\NovaGoogleMaps;

use Laravel\Nova\Nova;
use Laravel\Nova\Events\ServingNova;
use Illuminate\Support\ServiceProvider;

class FieldServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Nova::serving(function (ServingNova $event) {
            Nova::script('nova-google-maps', __DIR__.'/../dist/js/field.js');
            Nova::style('nova-google-maps', __DIR__.'/../dist/css/field.css');

            Nova::provideToScript([
                'gmap' => [
                    'api_key' => config('nova-google-maps.gmaps_api_key'),
                    'locale' => config('app.locale')
                ]
            ]);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $config_path = dirname(__DIR__).'/config/nova-google-maps.php';

        $this->publishes(
            [$config_path => config_path('nova-google-maps.php')],
            'config'
        );
    }
}
