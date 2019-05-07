<?php
use Illuminate\Support\Facades\Route;

Route::get('admin-panel/login', 'Auth\AdminLoginController@show_login_page')->name('admin.login');
Route::post('admin-panel/login', 'Auth\AdminLoginController@login')->name('admin.login');

Route::prefix('admin')->namespace('Admin')->as('admin.')->group(function (){

    Route::get('home','HomeController@dashboard')->name('home');

    Route::get('/category', 'CategoryController@index')->name('category');

    Route::get('/colors', 'ColorController@index')->name('color');
    Route::get('/tags','TagController@index')->name('tag');
    Route::get('/size', 'SizeController@index')->name('size');

    Route::get('/delivery-cost', 'DeliveryCostController@index')->name('delivery.cost');
});

Route::prefix('api/admin')->namespace('Admin')->group(function (){

});
