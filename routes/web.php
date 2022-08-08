<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
// Main Pages
Route::get('/', 'MainController@index');
Route::get('/about-us', 'MainController@aboutUs');
Route::get('/contact-us', 'MainController@contactUs');
Route::get('/privacy-policy', 'MainController@privacyPolicy');

// Customer Pages
Route::get('/home', 'CustomerController@shop')->name('customer.shop');
Route::get('/profile/{id}', 'CustomerController@profile');
Route::get('/profile/{id}/edit', 'CustomerController@editProfile');
Route::get('/shop', 'HomeController@index')->name('customer.cart');
Route::get('/show-product/{id}', 'CustomerController@show_product')->name('customer.show-product');
// Route::get('/search', 'CustomerController@search');
Route::get('/cart', 'CartController@index');
Route::post('add_to_cart', 'CartController@addToCart');
Route::get('/cart_list', 'CartController@cartList');
Route::delete('/cart_list/{id}', 'CartController@destroy')->name('cart-delete');
Route::post('/checkout', 'OrderController@checkout')->name('checkout');
Route::get('cart-count', 'CartController@cartItem')->name('cart_count');
Route::get('dashboard', 'Customercontroller@dashboard')->name('dashboard');
// Route::get('getOrders', 'Customercontroller@getOrders')->name('getOrders');
Route::post('place_order', 'OrderController@store')->name('placeOrder');

Auth::routes();
// Admin Pages
Route::resource('admin', 'AdminController');
Route::resource('account', 'AccountController');
Route::resource('product', 'ProductController');
Route::resource('order', 'OrderController');
Route::get('get-all-orders', 'OrderController@getAllOrders')->name('getAllOrders');
Route::resource('category', 'CategoryController');
Route::get('/pending-order', 'OrderController@pendingOrder');
// Route::get('/fetch-data', 'ProductController@fetchData')->name('product.fetchData');

// Route::get('/new-login', function () {
//     return view('login');
// });

// Route::get('/new-register', function () {
//     return view('register');
// });
// Route::get('/new-forgot-password', function () {
//     return view('forgot-password');
// });
