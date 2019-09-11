<?php

use Illuminate\Support\Facades\Route;

Route::get('seller/login', 'Auth\SellerLoginController@show_login_page')->name('seller.login');
Route::post('seller/login', 'Auth\SellerLoginController@login')->name('seller.login');
Route::get('seller/logout', 'Auth\SellerLoginController@logout')->name('seller.logout');

Route::post('seller/register', 'Auth\SellerRegisterController@register')->name('seller.register');

Route::prefix('seller')->middleware('auth:seller')->namespace('Seller')->as('seller.')->group(function (){

    Route::get('home', 'HomeController@index')->name('home');

    Route::post('/all_category/tree_list', 'GeneralDataListController@all_category_tree_list')->name('all_category.tree_list');
    Route::get('/brand/list','GeneralDataListController@brand_list')->name('brand.list');

    Route::get('/colors', 'GeneralDataListController@index')->name('color');
    Route::get('/tags','GeneralDataListController@index')->name('tag');




    Route::resource('/product', 'ProductController');
    Route::get('product/dependency/{catID}', 'ProductController@product_create_dependency')->name('product.dependency');
    Route::get('collection/product', 'ProductController@product_collection')->name('product.collection');
    Route::get('single/product/{product}','ProductController@single_product')->name('single.product');

    Route::post('product/image/store', 'ProductImageController@store')->name('product_image.store');
    Route::delete('product/image/delete/{id}', 'ProductImageController@delete')->name('product_image.delete');
});
