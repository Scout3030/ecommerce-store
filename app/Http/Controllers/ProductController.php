<?php

namespace App\Http\Controllers;

use App\Category;
use App\Color;
use App\Product;
use App\Review;
use Illuminate\Http\Request;

class ProductController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function home() {
		$categories = Category::withCount(['products'])->get();
		$colors = Color::withCount(['products'])->get();
		$topProducts = Product::limit(12)->get();
		return view('product.index', compact('categories', 'colors', 'topProducts'));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$products = Product::with(['category'])->get();
		return response()->json($products);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Product  $product
	 * @return \Illuminate\Http\Response
	 */
	public function showProducts($query = 'all', $category = 'all', $color = 'all') {

		if ($query == 'all' && $category == 'all' && $color == 'all') {

			$products = Product::with(['category'])->get();
		}

		if ($query != 'all' && $category == 'all' && $color == 'all') {

			$products = Product::with(['category'])
				->where('name', 'like', '%' . $query . '%')
				->orWhere('description', 'like', '%' . $query . '%')
				->get();
		}

		if ($query != 'all' && $category != 'all' && $color == 'all') {
			$products = Product::with(['category'])
				->where([['category_id', '=', $category], ['name', 'like', '%' . $query . '%']])
				->orWhere([['category_id', '=', $category], ['description', 'like', '%' . $query . '%']])
				->get();
		}

		if ($query != 'all' && $category != 'all' && $color != 'all') {
			$products = Product::with(['category'])
				->where([
					['category_id', '=', $category],
					['color_id', '=', $color],
					['name', 'like', '%' . $query . '%'],
				])
				->orWhere([
					['category_id', '=', $category],
					['color_id', '=', $color],
					['description', 'like', '%' . $query . '%'],
				])
				->get();
		}

		if ($query == 'all' && $category != 'all' && $color != 'all') {
			$products = Product::with(['category'])
				->where([
					['category_id', '=', $category],
					['color_id', '=', $color],
				])
				->get();
		}

		if ($query == 'all' && $category == 'all' && $color != 'all') {
			$products = Product::with(['category'])
				->whereColorId($color)
				->get();
		}

		if ($query == 'all' && $category != 'all' && $color == 'all') {
			$products = Product::with(['category'])
				->whereCategoryId($category)
				->get();
		}

		if ($query != 'all' && $category == 'all' && $color != 'all') {
			$products = Product::with(['category'])
				->where([
					['color_id', '=', $color],
					['name', 'like', '%' . $query . '%'],
				])
				->orWhere([
					['color_id', '=', $color],
					['description', 'like', '%' . $query . '%'],
				])
				->get();
		}

		return response()->json($products);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Product  $product
	 * @return \Illuminate\Http\Response
	 */
	public function show(Product $product) {
		$product->load([
			'category' => function ($q) {
				$q->select('id', 'name');
			},
			'reviews.user',
		])->get();

		$related = $product->relatedProducts();

		// dd($product);

		return view('product.show', compact('product', 'related'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Product  $product
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Product $product) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Product  $product
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Product $product) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Product  $product
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Product $product) {
		//
	}

	public function addReview() {
		Review::create([
			"user_id" => auth()->id(),
			"product_id" => request('product_id'),
			"rating" => (int) request('rating_input'),
			"comment" => request('message'),
		]);
		return back()->with('message', ['success', __('Muchas gracias por valorar el curso')]);
	}
}
