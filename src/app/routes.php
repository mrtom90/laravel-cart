<?php
/**
 * Created by EC-SOL.
 * Author: Pham Thai Duong
 * Date: 2016/03/30
 * Time: 18:03
 */

Route::group(['middleware' => 'web'], function () {
    Route::get('/test', function () {

        //return Order::all();
        //return view('courier::index');
        return array(
            'id' => '293ad',
            'name' => 'Product 1',
            'meta' => [
                'thumbnail' => ''
            ],
            'qty' => 1,
            'price' => 9.99,
            'codflag' => true,
            'quoteflag' => false,
            'shipid' => 1,
            'paymentid' => 1,
            'options' => array(
                'size' => 'large'
            )
        );
    });
});