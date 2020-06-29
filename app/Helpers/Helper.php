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

	public static function formatBytes($size, $precision = 2){
		if ($size > 0) {
			$size = (int) $size;
			$base = log($size) / log(1024);
			$suffixes = array('bytes', 'KB', 'MB', 'GB', 'TB');
			return round(pow(1024, $base - floor($fase)), $precision).$suffixes[floor($base)];
		}else {
			return $size;
		}
	}

	public static function removeImages($image)
	{
		foreach (config('constants.IMAGE_SIZES') as $imageSize){
			\File::delete(sprintf('%s/%s/%s', 'uploads', $imageSize[2], $image));
		}
		\File::delete(sprintf('%s/%s', 'uploads/gallery', $image));
	}

	public static function uploadFileResize($key, $path) {

		$file = request()->file('picture');
		$imageName = request()->file($key)->hashName();

		foreach (config('constants.IMAGE_SIZES') as $imageSize) {

			if (!\File::isDirectory(public_path($path . DIRECTORY_SEPARATOR . $imageSize[2]))) 
			{
				\Storage::makeDirectory($path . DIRECTORY_SEPARATOR . $imageSize[2]);
			}

			\Image::make($file)->resize($imageSize[0], $imageSize[1], function($constraint)
			{
				$constraint->aspectRatio();
			})->save(sprintf('%s/%s/%s/%s', public_path('storage'), $path , $imageSize[2], $imageName));
		}

		if (!\File::isDirectory(public_path($path . DIRECTORY_SEPARATOR . 'original'))) 
		{
			\Storage::makeDirectory($path . DIRECTORY_SEPARATOR . 'original');
		}

		$watermark = \Image::make(public_path('storage').DIRECTORY_SEPARATOR.'watermark'.DIRECTORY_SEPARATOR.'watermark.png');
		$img = \Image::make($file);
		$img->insert($watermark, 'bottom-right', 10,10);
		$img->save(sprintf('%s/%s/%s/%s', public_path('storage'), $path, 'original', $imageName));
		return $imageName;
	}
}