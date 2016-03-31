<?php
/**
 * Created by EC-SOL.
 * Author: Pham Thai Duong
 * Date: 2016/03/31
 * Time: 11:23
 */
namespace Mrtom90\LaravelCart\Facades;

use Illuminate\Support\Facades\Facade;

class Cart extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'cart';
    }
}