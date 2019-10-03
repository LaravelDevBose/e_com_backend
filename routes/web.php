<?php


use Illuminate\Support\Facades\Route;

Route::namespace('Frontend')->as('front.')->group(function () {
    Route::get('/', 'FrontendController@index')->name('index');
    Route::get('category/{category_slug}/products', 'FrontendController@category_wish_products')->name('category.product');
    Route::get('product/{product_slug}', 'FrontendController@product_details')->name('product');
    Route::get('cart', 'FrontendController@cart_page')->name('cart');
    Route::get('contact', 'FrontendController@contact_pages')->name('contact');
    Route::get('pages/{slug}', 'FrontendController@general_pages')->name('pages');

    Route::post('/product/sidebar/data', 'FrontendController@product_sidebar_data');
    Route::post('/shorting/products', 'FrontendController@sorting_product');
});

Route::post('/attachment/store', 'AttachmentController@store')->name('attachment.store');
Route::post('/crop_image/store', 'AttachmentController@crop_image_store')->name('crop_image.store');
Route::delete('/attachment/delete/{id}', 'AttachmentController@delete')->name('attachment.delete');
Route::get('/attachment/image/{id}', 'AttachmentController@attachment_image');


Route::prefix('error')->as('error.')->group(function (){
    Route::get('/404', 'ErrorController@error_404')->name('404');
});
