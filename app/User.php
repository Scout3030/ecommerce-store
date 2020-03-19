<?php

namespace App;

use App\Buyer;
use App\Role;
use App\UserSocialAccount;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
	use Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'email', 'password',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	public static function navigation() {
		return auth()->check() ? auth()->user()->role->name : 'guest';
	}

	public function role() {
		return $this->belongsTo(Role::class);
	}

	public function pathAttachment() {
		return "/images/users/" . $this->picture;
	}

	public function buyer() {
		return $this->hasOne(Buyer::class);
	}

	public function socialAccount() {
		return $this->hasOne(UserSocialAccount::class);
	}
}
