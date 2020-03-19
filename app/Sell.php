<?php

namespace App;

use App\Buyer;
use Illuminate\Database\Eloquent\Model;

class Sell extends Model {
	public function buyers() {
		return $this->belongsToMany(Buyer::class);
	}

	public function products() {
		return $this->belongsToMany(Products::class);
	}
}
