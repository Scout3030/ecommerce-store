<?php

namespace App\Http\Controllers;

use App\Opinion;
use Illuminate\Http\Request;

class OpinionController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}

	public function store(Request $request) {
		$request->merge(['user_id' => auth()->id()]);
		Opinion::create($request->input());
		return back();
	}
}
