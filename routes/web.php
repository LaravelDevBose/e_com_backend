<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


use Illuminate\Support\Facades\Route;

Route::namespace('Frontend')->as('front.')->group(function () {
    Route::get('/', 'FrontendController@index')->name('index');
    Route::get('category/{category_slug}/products', 'FrontendController@category_wish_products')->name('category.product');
    Route::get('product/{product_slug}', 'FrontendController@product_details')->name('product');
    Route::get('checkout', 'FrontendController@checkout')->name('checkout');
    Route::get('cart', 'FrontendController@cart_page')->name('cart');
    Route::get('contact', 'FrontendController@contact_pages')->name('contact');
    Route::get('pages/{slug}', 'FrontendController@general_pages')->name('pages');
});


Route::view('seller-login', 'auth.login')->name('sellerLogin');
Route::view('buyer-login', 'auth.buyer_login')->name('buyerLogin');
Route::namespace('Frontend')->group(function () {
    Route::get('user-dashboard', 'FrontendController@userDashboard')->name('userDashboard');
});
Route::view('account-information', 'frontend.user_dashboard.account_information')->name('accountInformation');
Route::view('edit-contact-info', 'frontend.user_dashboard.partials.edit_contact_info');
Route::view('change-password', 'frontend.user_dashboard.partials.change_password');
Route::view('address-book', 'frontend.user_dashboard.address_book')->name('addressBook');
Route::view('my-orders', 'frontend.user_dashboard.my_orders')->name('myOrders');
Route::view('my-product-reviews', 'frontend.user_dashboard.my_product_reviews')->name('productReviews');
Route::view('my-wishlist', 'frontend.user_dashboard.my_wishlist')->name('myWishlist');

Route::get('payment/methods', 'GeneralController@accepted_payment_methods');
Route::get('default/images', 'GeneralController@default_images');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/attachment/store', 'AttachmentController@store')->name('attachment.store');
Route::post('/crop_image/store', 'AttachmentController@crop_image_store')->name('crop_image.store');
Route::delete('/attachment/delete/{id}', 'AttachmentController@delete')->name('attachment.delete');
Route::get('/attachment/image/{id}', 'AttachmentController@attachment_image');
