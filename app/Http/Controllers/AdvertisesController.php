<?php

namespace App\Http\Controllers;

use App\Advertise;
use App\Category;
use App\Location;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

	public function show( int $advertise_id)
	{
		$user_id = auth()->user()['id'];

		$this->saveAdvertiseToView($user_id , $advertise_id);

		$advertise = Advertise::find($advertise_id);

		$user = User::find($advertise->user_id);

		return view('advertises.show' , compact('advertise' , 'user'));
	}


	public function saveAdvertiseToView($user , $advertise)
	{
		\App\Amir\view::create([
			'user_id'      => $user ,
			'advertise_id' => $advertise
		]);


	}

	public function view()
	{
		$user_id = auth()->user()['id'];

		$advertises = \App\Amir\view::where('user_id' , $user_id)->get();

		dd($advertises);
	}

}
