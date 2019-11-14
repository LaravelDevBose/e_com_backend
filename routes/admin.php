<?php
use Illuminate\Support\Facades\Route;

Route::get('admin/login', 'Auth\AdminLoginController@show_login_page')->name('admin.login');
Route::post('admin/login', 'Auth\AdminLoginController@login')->name('admin.login');
Route::get('admin/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
Route::prefix('admin')->middleware('auth:admin')->namespace('Admin')->as('admin.')->group(function (){

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
    Route::get('/tag/create', 'TagController@create')->name('tag.create');
    Route::post('/tag/store', 'TagController@store')->name('tag.store');
    Route::put('/tag/{tag}/update', 'TagController@update')->name('tag.update');
    Route::delete('/tag/delete/{tag}', 'TagController@destroy')->name('tag.delete');
    Route::post('/import/tags', 'TagController@import_tag')->name('import.tags');


    Route::resource('size_group', 'SizeGroupController');
    Route::post('/import/size-group/', 'SizeGroupController@import_size_group')->name('import.size_group');
    Route::post('/import/size/', 'SizeGroupController@import_size')->name('import.size');

    Route::get('/delivery-costs', 'DeliveryCostController@index')->name('delivery_costs');
    Route::get('/delivery-cost/create', 'DeliveryCostController@create')->name('delivery_cost.create');
    Route::post('/delivery-cost/store', 'DeliveryCostController@store')->name('delivery_cost.store');
    Route::delete('/delivery-cost/delete/{deliveryCost}', 'DeliveryCostController@destroy')->name('delivery_cost.delete');
    Route::post('/import/delivery_cost', 'DeliveryCostController@import_delivery_cost')->name('import.delivery_cost');

    Route::resource('/campaign', 'CampaignController');
    Route::get('/campaign/{campaign}/product/manage', 'CampaignController@manage_product_page')->name('campaign.product.manage');
    Route::put('/campaign/{campaign}/update/product-serial', 'CampaignController@update_product_serial')->name('campaign.update.product-serial');

    Route::get('/details', 'CampaignController@details');


    Route::resource('voucher', 'VoucherController');
    Route::get('formData/voucher/', 'VoucherController@formData')->name('voucher.formData');
    Route::get('voucher_list', 'VoucherController@voucherList')->name('voucher.list');

    Route::resource('/product', 'ProductController');
    Route::get('create/product/dependency/{catID}', 'ProductController@product_create_dependency')->name('product.create.dependency');
    Route::get('collection/product', 'ProductController@product_collection')->name('product.collection');
    Route::get('single/product/{product}','ProductController@single_product')->name('single.product');
    Route::get('/status/list/product', 'ProductController@get_product_status');
    Route::post('/product/status/update', 'ProductController@product_status_update')->name('product.status.update');

    Route::post('product/image/store', 'ProductImageController@store')->name('product_image.store');
    Route::delete('product/image/delete/{id}', 'ProductImageController@delete')->name('product_image.delete');

    Route::get('/un-publish/products', 'ProductPublishController@index')->name('un-publish.index');
    Route::post('products/status/change', 'ProductPublishController@change_products_status')->name('products.status.update');

    Route::resource('skinType', 'SkinTypeController');
    Route::post('/import/skinType', 'SkinTypeController@import_file')->name('import.skinType');

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
    });

    Route::prefix('order')->as('order.')->group(function () {
        Route::get('/', 'OrderController@index')->name('index');
        Route::get('/latest', 'OrderController@latest_order')->name('latest');
        Route::post('/list', 'OrderController@order_list')->name('list');
        Route::get('/status', 'OrderController@order_status');
        Route::get('/{order_no}/show', 'OrderController@show')->name('show');
        Route::post('/status/update', 'OrderController@update_order_status')->name('status.update');
    });

    Route::prefix('buyer')->as('buyer.')->group(function (){
        Route::get('/', 'BuyerController@index')->name('index');
        Route::get('/{buyer}/show', 'BuyerController@buyer_show')->name('show');
        Route::post('/{buyer}/change/status', 'BuyerController@buyer_status_change')->name('change.status');
        Route::delete('/{buyer}', 'BuyerController@destroy')->name('delete');
    });

    Route::prefix('shop')->as('shop.')->group(function (){
        Route::get('/', 'ShopController@index')->name('index');
        Route::get('/status', 'ShopController@shop_status')->name('status');
        Route::post('/{seller}/change/status', 'ShopController@shop_status_change')->name('change.status');
        Route::get('/{seller}', 'ShopController@show')->name('show');
        Route::delete('/{seller}', 'ShopController@destroy')->name('delete');
        Route::post('/{seller}/orders', 'ShopController@get_shop_orders')->name('orders');
    });

    Route::prefix('/homepage/section')->as('section.')->group(function (){
        Route::get('/', 'HomepageSectionController@index')->name('index');
        Route::get('/create', 'HomepageSectionController@create')->name('create');
        Route::post('/store', 'HomepageSectionController@store')->name('store');
        Route::get('/{section_id}/edit', 'HomepageSectionController@edit')->name('edit');
        Route::get('/{section_id}', 'HomepageSectionController@show')->name('show');
        Route::get('/{section_id}/add/products', 'HomepageSectionController@add_section_products')->name('add.product');
        Route::post('/products/store', 'HomepageSectionController@store_section_product')->name('products.store');
        Route::get('/{section_id}/manage/products', 'HomepageSectionController@manage_section_products')->name('manage.product');
        Route::post('/products/update', 'HomepageSectionController@update_section_product')->name('products.update');
    });

    Route::prefix('/group/products/')->as('group.')->group(function (){
        Route::get('/index', 'GroupProductController@index')->name('index');
        Route::get('/create', 'GroupProductController@create')->name('create');
        Route::post('/store', 'GroupProductController@store')->name('store');
        Route::get('/{groupId}/edit', 'GroupProductController@edit')->name('edit');
        Route::put('/{groupId}/update', 'GroupProductController@update')->name('update');
        Route::delete('/{groupId}', 'GroupProductController@destroy')->name('destroy');
    });

});

Route::prefix('api/admin')->namespace('Admin')->group(function (){

});
