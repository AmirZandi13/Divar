<?php

namespace App\Http\Controllers;

use App\Advertise;
use App\Category;
use App\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DivarController extends Controller
{

	public function index($city , $category)
	{


		$categories = Category::all()->toHierarchy();

		if ($category=='all')
		{
			$advertises = Advertise::
			where('location_id', $this->getLocationId($city)[0]['id'])
				->get();

		}else {

			$advertises = Advertise::
			    where('location_id', '=', $this->getLocationId($city)[0]['id'])
				->where('category_id', '=', $this->getCategoryId($category)[0]['id'])
				->get();

		}

		return view('main' , compact('categories' , 'advertises' , 'city'));
	}

	public function getCategoryId($category)
	{
		$id = Category::where('name' , $category)->get();
		return $id;
	}

	protected function getLocationId($location)
	{
		$id = Location::where('name' , $location)->get();
		return $id;
	}
}
