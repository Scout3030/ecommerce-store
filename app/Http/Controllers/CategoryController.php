<?php

namespace App\Http\Controllers;

use App\Category;

class CategoryController extends Controller {
	public function index() {
		$categories = Category::withCount(['products'])->orderBy('name', 'asc')->get();
		return response()->json($categories);
	}
}
