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
        if (!$this->app->routesAreCached()) {
            require __DIR__ . '/routes.php';
        }
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'courier');
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
* Register the service provider for the dependency.
 */
//        $this->app->register('LucaDegasperi\OAuth2Server\OAuth2ServerServiceProvider');
        /*
         * Create aliases for the dependency.
         */
//        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
//        $loader->alias('AuthorizationServer', 'LucaDegasperi\OAuth2Server\Facades\AuthorizationServerFacade');
//        $loader->alias('ResourceServer', 'LucaDegasperi\OAuth2Server\Facades\ResourceServerFacade');

    }

}