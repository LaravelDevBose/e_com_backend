<?php
use Illuminate\Support\Facades\Route;

Route::get('admin-panel/login', 'Auth\AdminLoginController@show_login_page')->name('admin.login');
Route::post('admin-panel/login', 'Auth\AdminLoginController@login')->name('admin.login');
Route::get('admin/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
Route::prefix('admin')->namespace('Admin')->as('admin.')->group(function (){

    Route::get('home','HomeController@dashboard')->name('home');

    Route::post('/category', 'CategoryController@index')->name('category');
    Route::post('/category/tree_list', 'CategoryController@category_tree')->name('category.tree_list');
    Route::post('/all_category/tree_list', 'CategoryController@all_category_tree')->name('all_category.tree_list');
    Route::get('/category/create', 'CategoryController@create')->name('category.create');
    Route::post('/category/store', 'CategoryController@store')->name('category.store');
    Route::post('/category/delete', 'CategoryController@destroy')->name('category.delete');

    Route::get('/brands','BrandController@index')->name('brand.index');
    Route::get('/brand/list','BrandController@brand_list')->name('brand.list');
    Route::get('brand/create', 'BrandController@create')->name('brand.create');
    Route::post('brand/store', 'BrandController@store')->name('brand.store');
    Route::delete('/brand/{brand}', 'BrandController@destroy')->name('brand.delete');

    Route::get('/colors', 'ColorController@index')->name('color');
    Route::get('/color/create','ColorController@create')->name('color.create');
    Route::post('/color/store', 'ColorController@store')->name('color.store');
    Route::delete('/color/delete/{color}', 'ColorController@destroy')->name('color.delete');
    Route::post('/import/color', 'ColorController@import')->name('color.import');

    Route::get('/tags','TagController@index')->name('tag');
    Route::get('/tag/create', 'TagController@create')->name('tag.create');
    Route::post('/tag/store', 'TagController@store')->name('tag.store');
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

});

Route::prefix('api/admin')->namespace('Admin')->group(function (){

});
