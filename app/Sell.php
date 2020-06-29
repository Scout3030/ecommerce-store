<?php

namespace App;

use App\Buyer;
use App\PaymentMethod;
use App\Shipping;
use App\SoldProduct;
use Illuminate\Database\Eloquent\Model;

class Sell extends Model {

	const FINISHED = 1;
	const INPROCESS = 2;
	const REJECTED = 3;

	protected $fillable = [
		'user_id', 'amount', 'payment_method_id', 'shipping_id', 'client_name', 'client_address', 'client_phone', 'client_message', 'status',
	];

	public function buyers() {
		return $this->belongsToMany(Buyer::class);
	}

	public function soldProducts() {
		return $this->hasMany(SoldProduct::class);
	}

	public function shipping() {
		return $this->belongsTo(Shipping::class);
	}

	public function paymentMethod() {
		return $this->belongsTo(PaymentMethod::class);
	}
}
