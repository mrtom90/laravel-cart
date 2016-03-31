<?php
/**
 * Created by EC-SOL.
 * Author: Pham Thai Duong
 * Date: 2016/03/30
 * Time: 14:30
 */

namespace Mrtom90\LaravelCart\Providers;

use Illuminate\Support\ServiceProvider;
use Mrtom90\LaravelCart\Cart;
use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;


class LaravelCartServiceProvider extends ServiceProvider
{
    protected $defer = false;

    public function boot(DispatcherContract $events)
    {

        $events->listen('cart.add', function ($id, $name, $qty, $price, $options) {

        });

        if (!$this->app->routesAreCached()) {
            require __DIR__ . '/../Http/routes.php';
        }
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'courier');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['cart'] = $this->app->share(function ($app) {
            $session = $app['session'];
            $events = $app['events'];
            return new Cart($session, $events);
        });


    }

}