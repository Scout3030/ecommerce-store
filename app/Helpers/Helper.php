<?php
namespace App\Helpers;

class Helper {
	public static function uploadFiles($key, $path) {
		$hash = collect();
		foreach (request()->file($key) as $key => $value) {
			$value->store($path);
			$hash->push($value->hashName());
		}
		return $hash;
	}

	public static function uploadFile($key, $path) {
		request()->file($key)->store($path);
		return request()->file($key)->hashName();
	}
}