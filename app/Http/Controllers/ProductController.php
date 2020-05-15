<?php

namespace App\Http\Controllers;

use App\Category;
use App\Color;
use App\Helpers\Helper;
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
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function adminIndex() {
		return view('admin.product.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$product = new Product;
		$btnText = 'Crear producto';
		return view('admin.product.create', compact('product', 'btnText'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$validatedData = $request->validate([
			'name' => 'required',
			'short_description' => 'required',
			'keywords' => 'required',
			'cost' => 'required',
			'price' => 'required',
			'stock' => 'required',
			'picture' => 'required',
			'category_id' => 'required',
		]);
		// $pictures = Helper::uploadFiles('picture', 'products');
		$picture = Helper::uploadFile('picture', 'products');
		// $request->merge(['picture' => $pictures]);
		$request->merge(['picture' => $picture]);
		$product = Product::create($request->input());
		return back()->with(['message' => 'Producto creado correctamente', 'description' => 'Has creado un nuevo producto, puedes editarlo en cualquier momento.']);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Product  $product
	 * @return \Illuminate\Http\Response
	 */
	public function searchProducts(Request $request) {

		$products = Product::with(['category'])
			->get();

		if ($request->has('word')) {
			$this->word = $request->word;
			$products = $products->filter(function ($value, $key) {
				return strpos($value->name, $this->word) ||
				strpos($value->long_description, $this->word) ||
				strpos($value->short_description, $this->word);
			});
		}

		if ($request->has('color')) {
			$this->color = $request->color;
			$products = $products->filter(function ($value, $key) {
				return $value->color_id == $this->color;
			});
		}

		if ($request->has('category')) {
			$this->category = $request->category;
			$products = $products->filter(function ($value, $key) {
				return $value->category_id == $this->category;
			});
		}

		$ids = $products->modelKeys();

		$products = Product::whereIn('id', $ids)->paginate(6);

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

		return view('product.show', compact('product', 'related'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Product  $product
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Product $product) {
		$btnText = 'Actualizar producto';
		return view('admin.product.create', compact('product', 'btnText'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Product  $product
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Product $product) {
		if ($request->hasFile('picture')) {
			\Storage::delete('courses/' . $course->picture);
			$picture = Helper::uploadFile("picture", 'courses');
			$request->merge(['picture' => $picture]);
		}
		$product->fill($request->input())->save();
		return back()->with(['message' => 'Producto actualizado correctamente']);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Product  $product
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Product $product) {
		$product->delete();
		return back()->with(['message' => 'Proucto eliminado correctamente']);
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

	public function bestSeller() {

		$products = Product::with(['category'])->limit(12)->get();
		// dd($products);
		return response()->json($products);
	}

	public function datatable() {
		$products = Product::get();
		$actions = 'admin.product.datatable.actions';
		return datatables()->of($products)
			->editColumn('cost', 'S/ {{$cost}}')
			->editColumn('price', 'S/ {{$price}}')
			->addColumn('actions', $actions)
			->rawColumns(['actions'])
			->toJson();
	}
}
