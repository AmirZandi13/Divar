<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Intervention\Image\Facades\Image;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	protected function uploadImages($file)
	{
		$year = Carbon::now()->year;
		$imagePath = "/upload/images/{$year}/";
		$filename = $file->getClientOriginalName();

		$file = $file->move(public_path($imagePath) , $filename);

		$sizes = ["300" , "600" , "900"];
		$url['images'] = $this->resize($file->getRealPath() , $sizes , $imagePath , $filename);
		$url['thumb'] = $url['images'][$sizes[0]];

		return $url;
	}

	private function resize($path , $sizes , $imagePath , $filename)
	{
		$images['original'] = $imagePath . $filename;
		foreach ($sizes as $size) {
			$images[$size] = $imagePath . "{$size}_" . $filename;

			Image::make($path)->resize($size, null, function ($constraint) {
				$constraint->aspectRatio();
			})->save(public_path($images[$size]));
		}

		return $images;
	}

	protected function setCourseTime($episode)
	{
		$course = $episode->course;
		$course->time = $this->getCourseTime($course->episodes->pluck('time'));
		$course->save();
	}

	protected function getCourseTime($times)
	{
		$timestamp = Carbon::parse('00:00:00');
//        $timestamp->setTimezone()
		foreach ($times as $t) {
			$time = strlen($t) == 5 ? strtotime('00:' . $t) : strtotime($t);
			$timestamp->addSecond($time);
		}
		return $timestamp->format('H:i:s');
	}
}
