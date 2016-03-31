<?php
/**
 * Created by EC-SOL.
 * Author: Pham Thai Duong
 * Date: 2016/03/30
 * Time: 18:03
 */
Route::group(['middleware' => 'web'], function () {
    Route::get('/test', function () {
        $data = [
            'full_name' => 'John Doe',
            'address' => 'Example Street',
            'hihi' => [
                1, 2, 3
            ]
        ];
        //return Cart::removeMetaData();
        //return Cart::removeMetaData('shipping_information');
        return Cart::setMetaData('shipping_information.test.full_name', $data);

        Cart::add(
            '293ad',
            'Product 1',
            1,
            9.99,
            ['size' => 'large'],
            ['size' => 'large']
        );
        return Cart::content();
        if (count(Cart::content()) > 1) {
            return view('courier::index');
        }

    });
});