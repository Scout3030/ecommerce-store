<?php

namespace App;

use App\Product;
use App\Sell;
use Illuminate\Database\Eloquent\Model;

class SoldProduct extends Model {
	protected $fillable = [
		'sell_id', 'product_id', 'qty',
	];

	// public function sells() {
	// 	return $this->belongsToMany(Sell::class);
	// }

	public function sell() {
		return $this->belongsTo(Sell::class);
	}

	public function product() {
		return $this->belongsTo(Product::class);
	}

}
