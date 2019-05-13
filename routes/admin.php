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
    Route::get('/size', 'SizeController@index')->name('size');

    Route::get('/delivery-cost', 'DeliveryCostController@index')->name('delivery.cost');

    Route::get('/campaign', 'CampaignController@index')->name('campaign');

    Route::resource('voucher', 'VoucherController');


});

Route::prefix('api/admin')->namespace('Admin')->group(function (){

});
