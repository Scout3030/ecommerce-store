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

Auth::routes();

Route::get('/images/{path}/{attachment}', function ($path, $attachment) {
	$file = sprintf('storage/%s/%s', $path, $attachment);
	if (File::exists($file)) {
		return Image::make($file)->response();
	}
});

Route::get('/', 'HomeController@index')->name('home');

Route::get('/contacto', function () {
	return view('contact');
})->name('contact');

Route::get('/tienda', 'ProductController@home')->name('product.index');

Route::group(['prefix' => 'producto'], function () {
	Route::get('/{product}', 'ProductController@show')->name('product.show');
	Route::post('/add_review', 'ProductController@addReview')->name('product.add_review');
});

Route::get('/carrito', function () {
	return view('cart');
})->name('cart');