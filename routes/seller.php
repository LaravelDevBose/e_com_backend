<?php

use Illuminate\Support\Facades\Route;

Route::get('seller-panel/login', 'Auth\SellerLoginController@show_login_page')->name('seller.login');
Route::post('seller-panel/login', 'Auth\SellerLoginController@login')->name('seller.login');
Route::get('seller/logout', 'Auth\SellerLoginController@logout')->name('seller.logout');

Route::post('seller/register', 'Auth\SellerRegisterController@register')->name('seller.register');

Route::prefix('seller')->middleware('auth:seller')->namespace('Seller')->as('seller.')->group(function (){

    Route::get('home', 'HomeController@index')->name('home');
});
