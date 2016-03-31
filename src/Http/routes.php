<?php
/**
 * Created by EC-SOL.
 * Author: Pham Thai Duong
 * Date: 2016/03/30
 * Time: 18:03
 */

Route::group(['middleware' => 'web'], function () {
    Route::get('/test', function () {


        Cart::add('293ad', 'Product 1', 1, 9.99, array('size' => 'large'));
        if(count(Cart::content()) > 1){
            return view('courier::index');


        }
        return Cart::content();
    });
});