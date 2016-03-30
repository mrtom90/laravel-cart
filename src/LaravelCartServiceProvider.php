<?php
/**
 * Created by EC-SOL.
 * Author: Pham Thai Duong
 * Date: 2016/03/30
 * Time: 14:30
 */

namespace Mrtom90\LaravelCart;

use Illuminate\Support\ServiceProvider;


class LaravelCartServiceProvider extends ServiceProvider
{
    protected $defer = false;

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../database/migrations/' => database_path('migrations')
        ], 'migrations');

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['LaravelCart'] = $this->app->share(function ($app) {
            $session = $app['session'];
            $events = $app['events'];
            return new LaravelCart($session, $events);
        });
    }

}