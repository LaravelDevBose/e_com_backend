<?php
use Illuminate\Support\Facades\Route;

Route::get('admin/login', 'Auth\AdminLoginController@show_login_page')->name('admin.login');
Route::post('admin/login', 'Auth\AdminLoginController@login')->name('admin.login');
Route::get('admin/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
Route::prefix('admin-panel')->middleware('auth:admin')->namespace('Admin')->as('admin.')->group(function (){

    Route::get('home','HomeController@dashboard')->name('home');

    Route::get('/category', 'CategoryController@index')->name('category');
    Route::post('/category/tree_list', 'CategoryController@category_tree')->name('category.tree_list');
    Route::post('/all_category/tree_list', 'CategoryController@all_category_tree')->name('all_category.tree_list');
    Route::get('/category/create', 'CategoryController@create')->name('category.create');
    Route::post('/category/store', 'CategoryController@store')->name('category.store');
    Route::post('/category/delete', 'CategoryController@destroy')->name('category.delete');
    Route::get('category/{category_id}', 'CategoryController@show')->name('category.show');
    Route::get('category/{category_id}/edit', 'CategoryController@edit')->name('category.edit');
    Route::put('category/{category_id}/update', 'CategoryController@update')->name('category.update');
    Route::post('/category/wish/products', 'CategoryController@category_wish_products')->name('category_wish.products');

    Route::get('/brands','BrandController@index')->name('brand.index');
    Route::get('/brand/list','BrandController@brand_list')->name('brand.list');
    Route::get('brand/create', 'BrandController@create')->name('brand.create');
    Route::post('brand/store', 'BrandController@store')->name('brand.store');
    Route::put('/brand/{brand}/update', 'BrandController@update')->name('brand.update');
    Route::delete('/brand/{brand}', 'BrandController@destroy')->name('brand.delete');

    Route::get('/colors', 'ColorController@index')->name('color');
    Route::get('/color/create','ColorController@create')->name('color.create');
    Route::post('/color/store', 'ColorController@store')->name('color.store');
    Route::put('/color/{color}/update', 'ColorController@update')->name('color.update');
    Route::delete('/color/delete/{color}', 'ColorController@destroy')->name('color.delete');
    Route::post('/import/color', 'ColorController@import')->name('color.import');

    Route::get('/tags','TagController@index')->name('tag');
    Route::get('/tag/list','TagController@tag_list');
    Route::get('/tag/create', 'TagController@create')->name('tag.create');
    Route::post('/tag/store', 'TagController@store')->name('tag.store');
    Route::put('/tag/{tag}/update', 'TagController@update')->name('tag.update');
    Route::delete('/tag/delete/{tag}', 'TagController@destroy')->name('tag.delete');
    Route::post('/import/tags', 'TagController@import_tag')->name('import.tags');


    Route::resource('size_group', 'SizeGroupController');
    Route::post('/import/size-group/', 'SizeGroupController@import_size_group')->name('import.size_group');
    Route::post('/import/size/', 'SizeGroupController@import_size')->name('import.size');


    Route::resource('/product', 'ProductController');
    Route::get('create/product/dependency/{catID}', 'ProductController@product_create_dependency')->name('product.create.dependency');
    Route::get('collection/product', 'ProductController@product_collection')->name('product.collection');
    Route::get('single/product/{product}','ProductController@single_product')->name('single.product');
    Route::get('/status/list/product', 'ProductController@get_product_status');
    Route::post('/product/status/update', 'ProductController@product_status_update')->name('product.status.update');
    Route::get('/product/status/update', 'ProductController@product_status_update')->name('product.status.update');
    Route::post('product/image/store', 'ProductImageController@store')->name('product_image.store');
    Route::delete('product/image/delete/{id}', 'ProductImageController@delete')->name('product_image.delete');
    Route::delete('product/{product_id}/validation/{variation_id}/delete', 'ProductController@variation_delete')->name('product.variation.delete');


    Route::prefix('cms')->namespace('Cms')->as('cms.')->group(function (){
        Route::resource('sliders', 'SliderController');
        Route::get('list/slider', 'SliderController@slider_list');
        Route::resource('pages', 'GeneralPagesController');
        Route::get('/list/pages', 'GeneralPagesController@page_list');
    });

    Route::prefix('setting')->namespace('Cms')->as('setting.')->group(function (){
        Route::get('/page', 'SettingController@setting_page')->name('page');
        Route::get('/data', 'SettingController@setting_data');
        Route::post('/contact/store', 'SettingController@contact_setting_store');
        Route::post('/campaign/store', 'SettingController@campaign_setting_store');
        Route::post('/delivery/store', 'SettingController@delivery_setting_store');
        Route::post('/logo/store', 'SettingController@logo_image_store');
        Route::post('/general/store', 'SettingController@general_setting_store');
    });

    Route::prefix('order')->as('order.')->group(function () {
        Route::get('/', 'OrderController@index')->name('index');
        Route::get('/latest', 'OrderController@latest_order')->name('latest');
        Route::post('/list', 'OrderController@order_list')->name('list');
        Route::get('/status', 'OrderController@order_status');
        Route::get('/{order_id}/show', 'OrderController@show')->name('show');
        Route::get('/{order_id}/details', 'OrderController@order_details')->name('details');
        Route::post('/status/update', 'OrderController@update_order_status')->name('status.update');
        Route::post('/item/status/update', 'OrderController@update_order_item_status')->name('item.status.update');
        Route::get('/{order_id}/print', 'OrderController@invoice_print')->name('order.print');
    });

    Route::prefix('buyer')->as('buyer.')->group(function (){
        Route::get('/', 'BuyerController@index')->name('index');
        Route::get('/list', 'BuyerController@user_list')->name('list');
        Route::get('/{user}/show', 'BuyerController@buyer_show')->name('show');
        Route::get('/{user}/details', 'BuyerController@user_details')->name('details');
        Route::post('/{user}/change/status', 'BuyerController@buyer_status_change')->name('change.status');
        Route::delete('/{user}', 'BuyerController@destroy')->name('delete');
    });

    Route::prefix('seller')->as('seller.')->group(function (){
        Route::get('/', 'SellerController@index')->name('index');
        Route::get('/list', 'SellerController@seller_list')->name('list');
        Route::get('/select/list', 'SellerController@seller_select_list');
        Route::get('/create', 'SellerController@create')->name('create');
        Route::post('/store', 'SellerController@store')->name('store');
        Route::get('/{sellerId}', 'SellerController@show')->name('show');
        Route::get('/{sellerId}/edit', 'SellerController@edit')->name('edit');
        Route::put('/{sellerId}/update', 'SellerController@update')->name('update');
        Route::delete('/{sellerId}', 'SellerController@destroy')->name('delete');
    });

    Route::prefix('delivery')->as('delivery.')->group(function (){
        Route::get('method', 'DeliveryMethodController@index')->name('method.index');
        Route::get('method/list', 'DeliveryMethodController@delivery_method_list')->name('method.list');
        Route::post('method/store', 'DeliveryMethodController@store')->name('method.store');
        Route::get('method/{delivery_id}/edit', 'DeliveryMethodController@edit')->name('method.edit');
        Route::put('method/{delivery_id}/update', 'DeliveryMethodController@update')->name('method.update');
        Route::delete('method/{delivery_id}', 'DeliveryMethodController@destroy')->name('method.delete');
    });

    Route::prefix('coupon-code')->as('coupon_code.')->group(function (){
        Route::get('/', 'CouponCodeController@index')->name('index');
        Route::get('/list', 'CouponCodeController@coupon_code_list')->name('list');
        Route::post('/store', 'CouponCodeController@store')->name('store');
        Route::get('/{coupon_id}/edit', 'CouponCodeController@edit')->name('edit');
        Route::put('/{coupon_id}/update', 'CouponCodeController@update')->name('update');
        Route::delete('/{coupon_id}', 'CouponCodeController@destroy')->name('delete');
    });

    Route::group(['prefix'=>'account', 'as'=>'account.'], function(){
        Route::get('/','AdminAccountController@index')->name('index');
        Route::get('/list','AdminAccountController@admin_list')->name('list');
        Route::post('/store','AdminAccountController@store')->name('store');
        Route::get('/{admin_id}','AdminAccountController@show')->name('show');
        Route::put('/{admin_id}/update','AdminAccountController@update')->name('update');
        Route::delete('/{admin_id}', 'AdminAccountController@destroy')->name('destroy');

        Route::get('/setting/page', 'AdminAccountController@setting_page')->name('setting.page');
        Route::post('/details/update', 'AdminAccountController@details_update')->name('details.update');
        Route::post('/password/update', 'AdminAccountController@change_password')->name('password.change');
    });

    Route::prefix('discount-product')->as('discount_product.')->group(function (){
        Route::get('/', 'DiscountProductController@index')->name('index');
        Route::get('/list', 'DiscountProductController@list')->name('list');
        Route::get('/create', 'DiscountProductController@create')->name('create');
        Route::post('/store', 'DiscountProductController@store')->name('store');
        Route::delete('/{coupon_id}', 'DiscountProductController@destroy')->name('delete');
    });

});

Route::get('/admin/newsletters', 'NewsLetterController@index')->middleware('auth:admin')->name('admin.newsletters');
Route::prefix('api/admin')->namespace('Admin')->group(function (){

});
