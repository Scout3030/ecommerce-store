<?php

namespace App\Http\Controllers;

use App\EmailSubscription;
use Illuminate\Http\Request;

class EmailSubscriptionController extends Controller {
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$email = EmailSubscription::whereEmail($request->email)->first();
		if ($email) {
			return response()->json('El email ya ha sido suscrito anteriormente', 200);
		}
		EmailSubscription::create($request->input());
		return response()->json('Subscripcion realizada correctamete', 200);
	}
}
