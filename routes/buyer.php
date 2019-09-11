<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('buyer/logout', 'Auth\LoginController@logout')->name('buyer.logout');
Route::prefix('buyer')->middleware('auth')->namespace('Buyer')->as('buyer.')->group(function (){

    Route::get('home', 'HomeController@index')->name('home');
    Route::get('account/information', 'HomeController@account_information')->name('account.info');
    Route::get('edit/contact-info', 'HomeController@edit_contact_info')->name('contact_info.edit');
    Route::get('change-password', 'HomeController@change_password')->name('change.password');
    Route::get('address-book', 'HomeController@address_book')->name('address.book');
    Route::get('my-orders', 'HomeController@my_orders')->name('myOrders');
    Route::get('product-reviews', 'HomeController@my_product_reviews')->name('reviews');
    Route::get('wish-list', 'HomeController@my_wishlist')->name('wish_list');
});



