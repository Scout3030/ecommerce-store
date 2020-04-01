<?php

namespace App;

use App\Buyer;
use App\Product;
use Illuminate\Database\Eloquent\Model;

class Sell extends Model {

	protected $fillable = [
		'user_id', 'amount', 'payment_method_id', 'shipping_id',
	];

	public function buyers() {
		return $this->belongsToMany(Buyer::class);
	}

	public function products() {
		return $this->hasMany(Product::class);
	}
}
