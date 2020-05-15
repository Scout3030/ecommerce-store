<?php

namespace App\Http\Controllers;

use App\SoldProduct;
use Carbon\Carbon;

class DashboardController extends Controller {
	public function sellCost() {
		$date = Carbon::now();
		$date->subWeeks(1)->format('Y-m-d h:i:s');

		$data = SoldProduct::join('products', 'products.id', '=', 'sold_products.product_id')
		// ->join('orders', 'users.id', '=', 'orders.user_id')
		// ->select('sold_products.qty', 'products.price')
		// ->select('sold_products.created_at')
		// ->selectRaw('sold_products.qty * products.price as price')
		// ->selectRaw('sold_products.qty * products.cost as cost')
			->selectRaw('sum(sold_products.qty * products.price) as price')
			->selectRaw('sum(sold_products.qty * products.cost) as cost')
			->selectRaw('DATE(sold_products.created_at) as date')
			->groupBy('date')
			->where('sold_products.created_at', '>', $date)
			->get();
		// dd($data);

		// $collection = collect($data);

		// $collection = $collection->only(['cost']);

		// dd($collection);

		return response()->json($data);
	}

	public function bestSelling() {

		$data = SoldProduct::with('product')
			->select('product_id')
			->selectRaw('sum(qty) as count')
			->groupBy('product_id')
			->orderBy('count', 'desc')
			->limit(6)
			->get();
		return response()->json($data);
	}
}
