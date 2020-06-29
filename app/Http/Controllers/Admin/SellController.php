<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Sell;

class SellController extends Controller {
	public function index() {
		return view('admin.sell.index');
	}

	public function show(Sell $sell) {
		$sell->load(
			'soldProducts.product',
			'shipping',
			'paymentMethod'
		);

		return view('admin.sell.show', compact('sell'));
	}

	public function datatable() {
		$sells = Sell::with(['shipping'])->get();
		$status = 'admin.sell.datatable.status';
		$actions = 'admin.sell.datatable.actions';
		return datatables()->of($sells)
			->editColumn('amount', 'S/  {{$amount}}')
			->addColumn('status', $status)
			->addColumn('actions', $actions)
			->rawColumns(['actions', 'status'])
			->toJson();
	}

	public function complete(Sell $sell) {
		$sell->status = Sell::FINISHED;
		// dd($sell->status);
		$sell->save();
		return redirect()->route('admin.sell.index');
	}

	public function reject(Sell $sell) {
		$sell->status = Sell::REJECTED;
		$sell->save();
		return back();
	}

}
