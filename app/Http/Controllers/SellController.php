<?php

namespace App\Http\Controllers;

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
		$newCollection = collect();

		foreach ($collection as $key => $value) {

			$keyCollection = collect(['id', 'qty']);
			$combined = $keyCollection->combine(collect($value));
			$newCollection->push($combined);
		}

		$amount = $newCollection->reduce(function ($carry, $item) {
			$product = Product::whereId($item['id'])->first();
			return $product->price * $item['qty'] + $carry;
		});

		if (auth()->check()) {
			$request->merge(['buyer_id' => auth()->user->buyer->id]);
		}

		$request->merge(['amount' => $amount]);
		$input = $request->only('buyer_id', 'amount', 'payment_method_id', 'shipping_id');
		$sell = Sell::create($input);

		foreach ($newCollection as $key => $value) {
			SoldProduct::create([
				'sell_id' => $sell->id,
				'product_id' => $value['id'],
				'qty' => $value['qty'],
			]);
		}

		return view('order-confirmation');

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
