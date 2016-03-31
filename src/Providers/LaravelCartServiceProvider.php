<?php
/**
 * Created by EC-SOL.
 * Author: Pham Thai Duong
 * Date: 2016/03/30
 * Time: 14:30
 */

namespace Mrtom90\LaravelCart\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;


class LaravelCartServiceProvider extends ServiceProvider
{
    protected $defer = false;

    public function boot()
    {
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
        $this->app['LaravelCart'] = $this->app->share(function ($app) {
            $session = $app['session'];
            $events = $app['events'];
            return new LaravelCart($session, $events);
        });

        $this->app->register('Gloudemans\Shoppingcart\ShoppingcartServiceProvider');
        /*
         * Create aliases for the dependency.
         */
        $loader = AliasLoader::getInstance();
        $loader->alias('Cart', 'Gloudemans\Shoppingcart\Facades\Cart');

    }

}