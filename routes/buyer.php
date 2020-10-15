<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('buyer/logout', 'Auth\LoginController@logout')->name('buyer.logout');
Route::prefix('buyer')->middleware('auth:api')->namespace('Buyer')->as('buyer.')->group(function (){

    Route::get('/user/info', 'HomeController@userInfo');
    Route::get('/info', 'HomeController@buyer_info')->name('info');
    Route::post('/info/update', 'HomeController@update_buyer_info')->name('info.update');

    Route::get('home', 'HomeController@index')->name('home');
    Route::get('account/information', 'HomeController@account_information')->name('account.info');
    Route::get('edit/contact-info', 'HomeController@edit_contact_info')->name('contact_info.edit');
    Route::get('change-password', 'HomeController@change_password')->name('change.password');
    Route::get('wish-list', 'HomeController@my_wishlist')->name('wish_list');

    //WishList Data Route
    Route::get('wishLists', 'WishListController@wish_lists');
    Route::post('/wishList/add', 'WishListController@add_to_wish_list');
    Route::post('/wishList/remove', 'WishListController@remove_from_wish_list');
    Route::get('checkout', 'CheckoutController@index')->name('checkout');

    /*** Buyer Order Route List ***/
    Route::get('my-orders', 'OrderController@index')->name('order.index');
    Route::post('/order/store', 'OrderController@order_store')->name('order.store');

    Route::get('/order/{order_no}/show', 'OrderController@show')->name('order.show');
    Route::get('/order/{order_id}/invoice', 'OrderController@order_details');
    Route::get('/order/{order_id}/cancel', 'OrderController@order_cancel');
    Route::get('/order/item/{item_id}/cancel', 'OrderController@order_item_cancel');



    /**** Address Book Route List ****/
    Route::get('address-book/list', 'AddressBookController@index')->name('address.book');
    Route::get('address-book/create', 'AddressBookController@create')->name('address.book.create');
    Route::post('address-book', 'AddressBookController@store');
    Route::get('address-book/{address_id}/', 'AddressBookController@show')->name('address.book.show');
    Route::get('address-book/{address_id}/edit', 'AddressBookController@edit')->name('address.book.edit');
    Route::put('address-book/{address_id}/update', 'AddressBookController@update')->name('address.book.update');

    Route::prefix('reviews')->as('reviews.')->group(function (){
        Route::get('/', 'ReviewController@index')->name('index');
        Route::get('/list', 'ReviewController@review_list')->name('list');
        Route::get('/order/{orderId}/items', 'ReviewController@get_order_items')->name('order.items');
        Route::get('/add/{orderId}', 'ReviewController@add_review_page')->name('add');
        Route::post('/store', 'ReviewController@store')->name('store');
    });

});

