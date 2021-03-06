<?php

namespace App;

use App\Category;
use App\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model {

	use SoftDeletes;

	protected $fillable = ['name', 'picture'];

	protected static function boot() {
		parent::boot();
		static::creating(function (Category $category) {
			if (!\App::runningInConsole()) {
				$category->slug = str_slug($category->name);
			}
		});
	}

	public function pathAttachment() {
		return "/images/categories/" . $this->picture;
	}

	public function products() {
		return $this->hasMany(Product::class);
	}

	public function getRouteKeyName() {
		return 'slug';
	}
}
