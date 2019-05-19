<?php
use Illuminate\Support\Facades\Route;

Route::get('admin-panel/login', 'Auth\AdminLoginController@show_login_page')->name('admin.login');
Route::post('admin-panel/login', 'Auth\AdminLoginController@login')->name('admin.login');
Route::get('admin/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
Route::prefix('admin')->namespace('Admin')->as('admin.')->group(function (){

    Route::get('home','HomeController@dashboard')->name('home');

    Route::post('/category', 'CategoryController@index')->name('category');
    Route::post('/category/tree_list', 'CategoryController@category_tree')->name('category.tree_list');
    Route::get('/category/create', 'CategoryController@create')->name('category.create');
    Route::post('/category/store', 'CategoryController@store')->name('category.store');
    Route::post('/category/delete', 'CategoryController@destroy')->name('category.delete');

    Route::get('/colors', 'ColorController@index')->name('color');
    Route::get('/color/create','ColorController@create')->name('color.create');
    Route::post('/color/store', 'ColorController@store')->name('color.store');
    Route::delete('/color/delete/{color}', 'ColorController@destroy')->name('color.delete');

    Route::get('/tags','TagController@index')->name('tag');
    Route::get('/tag/create', 'TagController@create')->name('tag.create');
    Route::post('/tag/store', 'TagController@store')->name('tag.store');
    Route::delete('/tag/delete/{tag}', 'TagController@destroy')->name('tag.delete');

    Route::resource('size_group', 'SizeGroupController');
    Route::resource('/size', 'SizeController');

    Route::get('/delivery-costs', 'DeliveryCostController@index')->name('delivery_costs');
    Route::get('/delivery-cost/create', 'DeliveryCostController@create')->name('delivery_cost.create');
    Route::post('/delivery-cost/store', 'DeliveryCostController@store')->name('delivery_cost.store');
    Route::delete('/delivery-cost/delete/{deliveryCost}', 'DeliveryCostController@destroy')->name('delivery_cost.delete');


    Route::resource('/campaign', 'CampaignController');

    Route::resource('voucher', 'VoucherController');
    Route::get('formData/voucher/', 'VoucherController@formData')->name('voucher.formData');
    Route::get('voucher_list', 'VoucherController@voucherList')->name('voucher.list');

});

Route::prefix('api/admin')->namespace('Admin')->group(function (){

});
