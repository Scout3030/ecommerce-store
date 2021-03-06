<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:api')->get('/user', function (Request $request) {
	return $request->user();
});

Route::apiResource('category', 'CategoryController');
Route::apiResource('color', 'ColorController');
Route::apiResource('product', 'ProductController');
Route::apiResource('shipping', 'ShippingController');
Route::apiResource('payment-method', 'PaymentMethodController');
Route::apiResource('email-subscription', 'EmailSubscriptionController');

Route::post('coupon', 'CouponController@getCoupon');

Route::get('search', 'ProductController@searchProducts');
Route::get('category/{category}/search', 'ProductController@searchProductsByCategory');
Route::get('best-seller', 'ProductController@bestSeller');

Route::get('/sell-cost', 'DashboardController@sellCost');
Route::get('/best-selling', 'DashboardController@bestSelling');
