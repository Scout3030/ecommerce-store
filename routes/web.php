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

Route::get('/images/{path}/{size}/{attachment}', function ($path, $size, $attachment) {
	$file = sprintf('storage/%s/%s/%s', $path, $size, $attachment);
	// return $file;
	if (File::exists($file)) {
		return Image::make($file)->response();
	}
});

Route::get('/', 'HomeController@index')->name('home');

Route::get('/nosotros', function () {
	return view('about');
})->name('about');

Route::get('/opiniones', function () {
	session(['opinion' => true]);
	return view('reviews');
})->name('reviews');

Route::get('/preguntas-frecuentes', function () {
	return view('FAQ');
})->name('FAQ');

Route::get('/contacto', function () {
	return view('contact');
})->name('contact');

Route::post('/contacto', function () {
	return back();
})->name('contact.post');

Route::get('/checkout', function () {
	session(['checkout' => true]);
	return view('checkout');
})->name('checkout');

Route::get('/gracias/{sell}', function (App\Sell $sell) {
	$sell->load([
		'soldProducts' => function ($q) {
			$q->with(['product']);
		},
		'shipping',
		'paymentMethod',
	]);
	return view('confirmation', compact('sell'));
})->name('confirmation');

Route::get('/tienda', 'ProductController@home')->name('product.index');

Route::group(['prefix' => 'producto'], function () {
	Route::get('/{product}', 'ProductController@show')->name('product.show');
	Route::post('/add_review', 'ProductController@addReview')->name('product.add_review');
});

Route::get('/carrito', function () {
	return view('cart');
})->name('cart');

/*=====================================
=            PDF Generator            =
=====================================*/

Route::get('/order/{sell}', 'PDFGeneratorController@generatePDF');

/*=====  End of PDF Generator  ======*/

/*=============================================
=            Sell comment block            =
=============================================*/

Route::group(['prefix' => "sells"], function () {

	Route::get('/', 'SellController@adminIndex')->name('admin.product.index');
	Route::get('/create', 'SellController@create')->name('admin.product.create');
	Route::post('/', 'SellController@store')->name('admin.product.store');
	Route::get('/edit/{product}', 'SellController@edit')->name('admin.product.edit');
	Route::put('/{product}', 'SellController@update')->name('admin.product.update');
	Route::delete('/{product}', 'SellController@destroy')->name('admin.product.delete');
	Route::get('/datatable', 'SellController@datatable')->name('admin.product.datatable');
});

/*=====  End of Sell comment block  ======*/

/*=============================================
=            Opinion block            =
=============================================*/

Route::group(['prefix' => "opinion"], function () {
	Route::post('/', 'OpinionController@store')->name('opinion.store');
});

/*=====  End of Opinion block  ======*/

/*=============================
=            admin            =
=============================*/

Route::group(['prefix' => "dashboard", "middleware" => ['auth', sprintf("role:%s", \App\Role::ADMIN)]], function () {

	Route::get('/', 'AdminController@index')->name('admin.index');

	Route::group(['prefix' => "products"], function () {

		Route::get('/', 'ProductController@adminIndex')->name('admin.product.index');
		Route::get('/create', 'ProductController@create')->name('admin.product.create');
		Route::post('/', 'ProductController@store')->name('admin.product.store');
		Route::get('/edit/{product}', 'ProductController@edit')->name('admin.product.edit');
		Route::put('/{product}', 'ProductController@update')->name('admin.product.update');
		Route::delete('/{product}', 'ProductController@destroy')->name('admin.product.delete');
		Route::get('/datatable', 'ProductController@datatable')->name('admin.product.datatable');
	});

	Route::group(['prefix' => "categories"], function () {

		Route::get('/', 'CategoryController@adminIndex')->name('admin.category.index');
		Route::get('/create', 'CategoryController@create')->name('admin.category.create');
		Route::post('/', 'CategoryController@store')->name('admin.category.store');
		Route::get('/edit/{category}', 'CategoryController@edit')->name('admin.category.edit');
		Route::put('/{category}', 'CategoryController@update')->name('admin.category.update');
		Route::delete('/{category}', 'CategoryController@destroy')->name('admin.category.delete');
		Route::get('/datatable', 'CategoryController@datatable')->name('admin.category.datatable');
	});

	Route::group(['prefix' => "colors"], function () {

		Route::get('/', 'ColorController@adminIndex')->name('admin.color.index');
		Route::get('/create', 'ColorController@create')->name('admin.color.create');
		Route::post('/', 'ColorController@store')->name('admin.color.store');
		Route::get('/edit/{color}', 'ColorController@edit')->name('admin.color.edit');
		Route::put('/{color}', 'ColorController@update')->name('admin.color.update');
		Route::delete('/{color}', 'ColorController@destroy')->name('admin.color.delete');
		Route::get('/datatable', 'ColorController@datatable')->name('admin.color.datatable');
	});

	Route::group(['prefix' => "orders"], function () {

		Route::get('/', 'Admin\SellController@index')->name('admin.sell.index');
		Route::get('/show/{sell}', 'Admin\SellController@show')->name('admin.sell.show');
		Route::get('/edit/{sell}', 'Admin\SellController@edit')->name('admin.sell.edit');
		Route::put('/reject/{sell}', 'Admin\SellController@reject')
			->name('admin.sell.reject');
		Route::put('/complete/{sell}', 'Admin\SellController@complete')
			->name('admin.sell.complete');
		Route::get('/datatable', 'Admin\SellController@datatable')
			->name('admin.sell.datatable');
	});

});

/*=====  End of admin  ======*/
