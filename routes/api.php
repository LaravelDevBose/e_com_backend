<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::namespace('Api')->group(function (){
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
    Route::post('social-login', 'AuthController@social_login');
});

Route::middleware('auth:api')->namespace('Api')->group(function (){
    Route::post('logout', 'AuthController@logout');

});

Route::middleware('auth:api')->namespace('Buyer')->group(function (){
    Route::get('get/delivery-methods', 'CheckoutController@get_delivery_info');
    Route::get('get/checkout-data', 'CheckoutController@get_checkout_session');
    Route::post('store/checkout-info', 'CheckoutController@store_checkout_info_session');
    Route::post('/coupon-apply', 'CheckoutController@check_coupon_code');

    Route::get('/order-list', 'OrderController@order_list');


    Route::group(['prefix'=>'bkash'], function (){
        Route::post('get-token', 'BkashPaymentController@get_token');
        Route::post('create-payment', 'BkashPaymentController@create_payment');
        Route::post('execute-payment', 'BkashPaymentController@execute_payment');
    });

});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
