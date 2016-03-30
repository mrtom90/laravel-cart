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

    }


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['ECart'] = $this->app->share(function ($app) {
            $session = $app['session'];
            $events = $app['events'];
            return new ECart($session, $events);
        });
    }

}