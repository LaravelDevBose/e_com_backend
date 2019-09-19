<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('buyer/logout', 'Auth\LoginController@logout')->name('buyer.logout');
Route::prefix('buyer')->middleware('auth')->namespace('Buyer')->as('buyer.')->group(function (){

    Route::get('home', 'HomeController@index')->name('home');
    Route::get('account/information', 'HomeController@account_information')->name('account.info');
    Route::get('edit/contact-info', 'HomeController@edit_contact_info')->name('contact_info.edit');
    Route::get('change-password', 'HomeController@change_password')->name('change.password');
    Route::get('product-reviews', 'HomeController@my_product_reviews')->name('reviews');
    Route::get('wish-list', 'HomeController@my_wishlist')->name('wish_list');

    //WishList Data Route
    Route::get('wishLists', 'WishListController@wish_lists');
    Route::post('/wishList/add', 'WishListController@add_to_wish_list');
    Route::post('/wishList/remove', 'WishListController@remove_from_wish_list');

    Route::get('checkout', 'CheckoutController@index')->name('checkout');

    /*** Buyer Order Route List ***/
    Route::get('my-orders', 'OrderController@index')->name('order.index');
    Route::post('/order/store', 'OrderController@order_store')->name('order.store');
    Route::post('/order/list', 'OrderController@order_list');
    Route::get('/order/{order_no}/show', 'OrderController@show')->name('order.show');


    /**** Address Book Route List ****/
    Route::get('address-book/list', 'AddressBookController@index')->name('address.book');
    Route::get('address-book/create', 'AddressBookController@create')->name('address.book.create');
    Route::post('address-book', 'AddressBookController@store');
    Route::get('address-book/{address_id}/', 'AddressBookController@show')->name('address.book.show');

});

Route::namespace('Buyer')->group(function (){
    Route::get('/cart/list', 'CartController@cart_details')->name('cart.details');
    Route::post('/cart/add', 'CartController@add_to_cart');
    Route::put('/cart/update', 'CartController@cart_update');
    Route::delete('/cart/{cartId}/remove', 'CartController@remove_from_cart');
    Route::delete('/destroy/cart', 'CartController@cart_destroy');
});

