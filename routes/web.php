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

Route::get('/tienda', 'ProductController@index')->name('product.index');

Route::get('/producto/{product}', 'ProductController@show')->name('product.show');
