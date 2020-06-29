<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Opinion extends Model {
	const PUBLISHED = 1;
	const UNPUBLISHED = 2;

	protected $fillable = ['user_id', 'comment', 'status'];

	public function user() {
		return $this->belongsTo(User::class);
	}

}
