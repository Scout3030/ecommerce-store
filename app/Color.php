<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class Color extends Model {
	public function getRouteKeyName() {
		return 'slug';
	}

	public function products() {
		return $this->hasMany(Product::class);
	}
}
