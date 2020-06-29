<?php

namespace App\Http\Controllers;

use App\Mail\NewOrder;
use App\Product;
use App\Sell;
use App\SoldProduct;
use Illuminate\Http\Request;

class SellController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		//
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
		// dd($request->all());
		$data = explode(",", $request->cart);

		$collection = collect($data)->chunk(2);
		$newCartCollection = collect();

		foreach ($collection as $key => $value) {

			$keyCollection = collect(['id', 'qty']);
			$combined = $keyCollection->combine(collect($value));
			$newCartCollection->push($combined);
		}

		$amount = $newCartCollection->reduce(function ($carry, $item) {
			$product = Product::whereId($item['id'])->first();
			return $product->price * $item['qty'] + $carry;
		});

		if (auth()->check()) {
			$request->merge(['buyer_id' => auth()->user()->buyer->id]);
		}

		if ($amount > 150) {
			$request->merge(['shipping_id' => 1]);
		} else {
			$request->merge(['shipping_id' => 3]);
		}

		$request->merge(['amount' => $amount]);
		$input = $request->only('buyer_id', 'amount', 'payment_method_id', 'shipping_id', 'client_name', 'client_address', 'client_phone', 'client_message');
		$sell = Sell::create($input);

		$soldProductLines = [];
		$newCartCollection->map(function ($product) use (&$soldProductLines, $sell) {
			$soldProductLines[] = [
				"sell_id" => $sell->id,
				"product_id" => $product['id'],
				"qty" => $product['qty'],
			];
		});
		SoldProduct::insert($soldProductLines);

		\Mail::to('sistema@huamachucostore.com')->send(new NewOrder($sell));

		return redirect()->route('confirmation', $sell->id);

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
	}
}
