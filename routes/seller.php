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
    Route::delete('product/{product_id}/validation/{variation_id}/delete', 'ProductController@variation_delete')->name('product.variation.delete');

    Route::get('campaigns', 'CampaignController@index')->name('campaign.index');
    Route::get('campaign/joined/list', 'CampaignController@joined_list')->name('campaign.joined.list');
    Route::get('campaign/{slug}/join/', 'CampaignController@join_page')->name('campaign.join');
    Route::post('campaign/store', 'CampaignController@store')->name('campaign.store');
    Route::get('campaign/{slug}/show', 'CampaignController@show')->name('campaign.show');

    Route::prefix('order')->as('order.')->group(function () {
        Route::get('/', 'OrderController@index')->name('index');
        Route::get('/latest', 'OrderController@latest_order')->name('latest');
        Route::get('/deliver/order', 'OrderController@deliver_order_page')->name('deliver');
        Route::get('/ready_to_ship', 'OrderController@ready_to_ship_order')->name('ready_to_ship');
        Route::get('/cancel_order', 'OrderController@order_cancel_page')->name('cancel_order');

        Route::post('/item/list', 'OrderController@order_item_list')->name('item.list');
        Route::get('/item/status', 'OrderController@order_item_status');
        Route::get('/all/item/status', 'OrderController@order_all_item_status');
        Route::post('/item/status/update', 'OrderController@update_order_item_status')->name('item.status.update');
    });

    Route::prefix('shop')->as('shop.')->group(function () {
        Route::get('setting', 'ShopController@shop_setting_page')->name('setting');
        Route::post('setting/update', 'ShopController@shop_setting_update')->name('setting.update');
        Route::post('banner/update', 'ShopController@shop_banner_update')->name('banner.update');
    });

    Route::get('account/setting/page', 'SettingController@account_setting_page')->name('account.setting.page');
    Route::get('account/info', 'SettingController@account_info')->name('account.info');
    Route::post('update/account/info', 'SettingController@update_account_info')->name('update.account.info');
    Route::post('update/password', 'SettingController@update_password')->name('update.password');

    Route::post('brand/request/store', 'GeneralDataListController@brand_req_store')->name('brand.req.store');
});
