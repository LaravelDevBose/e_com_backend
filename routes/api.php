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
    Route::post('/coupon-apply', 'CheckoutController@check_coupon_code');

    Route::post('/order/store', 'OrderController@order_store');
    Route::get('/order-list', 'OrderController@order_list');
    Route::get('/order/{order_no}/details', 'OrderController@order_details');

    //WishList Data Route
    Route::get('wishLists', 'WishListController@wish_lists');
    Route::get('/wishlist/{slug}/add', 'WishListController@add_to_wish_list');
    Route::delete('/wishlist/{slug}/remove', 'WishListController@remove_from_wish_list');

    Route::prefix('reviews')->as('reviews.')->group(function (){
        Route::get('/list', 'ReviewController@review_list');
        Route::get('/order/{order_no}/items', 'ReviewController@get_order_items');
        Route::post('/store', 'ReviewController@store');
    });


    Route::group(['prefix'=>'bkash'], function (){
        Route::post('get-token', 'BkashPaymentController@get_token');
        Route::post('create-payment', 'BkashPaymentController@create_payment');
        Route::post('execute-payment', 'BkashPaymentController@execute_payment');
    });

});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
