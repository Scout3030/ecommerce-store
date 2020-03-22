<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;

class HomeController extends Controller {

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index() {

		$categories = Category::limit(6)
			->withCount('products')
			->get();

		$topProducts = Product::with(['category'])
			->limit(16)
			->get();

		$news = Product::with(['category'])
			->latest()
			->limit(10)
			->get();

		return view('home', compact('topProducts', 'news', 'categories'));
	}
}
