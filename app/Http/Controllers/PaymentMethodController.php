<?php

namespace App\Http\Controllers;

use App\PaymentMethod;

class PaymentMethodController extends Controller {
	public function index() {
		$paymentMethods = PaymentMethod::get();
		return response()->json($paymentMethods);
	}
}
