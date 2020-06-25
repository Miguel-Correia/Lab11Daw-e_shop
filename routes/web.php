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
Route::get('/store', 'Store@index' )->name('store');
Route::get('/store/index/{id?}', 'Store@index' )->name('store');
Route::get('/store/cart/{id}', 'Store@cartItemInsert' )->name('cart'); 
Route::get('/store/emptycart', 'Store@cartEmpty' )->name('emptyCart'); 

Route::get('/store/register', 'Store@register' )-> name('register');
Route::post('/store/register', 'Store@registerAction' )->name('registerAct');
Route::get('/store/login', 'Store@login' ) -> name('login');
Route::post('/store/login', 'Store@loginAction' )->name('loginAct');
Route::get('/store/logout', 'Store@logout' )->name('logout');

Route::get('/store/checkout', 'Store@checkout' )->name('checkout');
Route::get('/store/checkout/action', 'Store@checkoutAction' )->name('checkoutAct');

Route::get('/store/checkout/qtychange/{id}/{type}', 'Store@qtyChange' )->name('qtyChange');
Route::get('/store/checkout/remove/{id}', 'Store@remove')->name('remove');

Route::get('/store/orders', 'Store@orders' )->name('orders');
Route::get('/store/orders/{id}', 'Store@orderDetails' )->name('orderDetails');

Route::get('/', function () {
    return view('welcome');
});
