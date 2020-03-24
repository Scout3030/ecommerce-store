<?php

namespace App;

use App\Color;
use App\Product;
use App\Review;
use App\Sell;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {

	// protected $fillable = ['teacher_id', 'name', 'description', 'picture', 'level_id', 'category_id', 'status'];

	// protected $withCount = ['reviews', 'buyers'];

	protected static function boot() {
		parent::boot();
		static::creating(function (Product $product) {
			if (!\App::runningInConsole()) {
				$product->slug = str_slug($product->name);
			}
		});
	}

	public function pathAttachment() {
		return "/images/products/" . $this->picture;
	}

	public function category() {
		return $this->belongsTo(Category::class)->select('id', 'name');
	}

	public function color() {
		return $this->belongsTo(Color::class)->select('id', 'name');
	}

	public function sells() {
		return $this->belongsToMany(Sell::class);
	}

	public function getRouteKeyName() {
		return 'slug';
	}

	public function getCustomRatingAttribute() {
		return $this->reviews->avg('rating');
	}

	public function relatedProducts() {
		return Product::whereCategoryId($this->category->id)
			->where('id', '!=', $this->id)
			->latest()
			->limit(12)
			->get();
	}

	public function reviews() {
		return $this->hasMany(Review::class)->select('id', 'user_id', 'product_id', 'rating', 'comment', 'created_at');
	}
}
