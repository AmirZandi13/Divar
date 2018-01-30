<?php

namespace App\Http\Controllers;

use App\Advertise;
use App\Category;
use App\Location;
use App\User;
use App\view;
use Illuminate\Http\Request;

class AdvertisesController extends Controller
{

	public function index()
	{
		$cities = Location::all();
		$categories = Category::all();
		return view('advertises.create' , compact(['cities' , 'categories']));
	}



		public function store(Request $request)
	{
		$imagesUrl = $this->uploadImages($request->file('image'));
		auth()->user()->advertises()->create(array_merge($request->except('_token') , [ 'image' => $imagesUrl]));

		return redirect('/divar/tehran/all');
	}

	public function show($advertise_id)
	{
		$advertise = Advertise::find($advertise_id);

		$user = User::find($advertise->user_id);

		return view('advertises.show' , compact('advertise' , 'user'));
	}

}
