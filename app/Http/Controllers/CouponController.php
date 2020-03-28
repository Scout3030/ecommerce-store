<?php

namespace App\Http\Controllers;

use App\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getCoupon(Request $request) {
		$descount = Coupon::whereName($request->coupon)->first();
		if ($descount) {
			return response()->json($descount, 200);
		}
		return response()->json('No hay cupon aplicable', 400);
	}
}
