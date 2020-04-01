<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Color extends Model {

	use SoftDeletes;

	protected $fillable = ['name'];

	public function getRouteKeyName() {
		return 'slug';
	}

	public function products() {
		return $this->hasMany(Product::class);
	}
}
