<?php

namespace App;

use App\Sell;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Buyer extends Model {
	public function sells() {
		return $this->belongsToMany(Sell::class);
	}

	public function user() {
		return $this->belongsTo(User::class)->select('id', 'role_id', 'name', 'email');
	}
}
