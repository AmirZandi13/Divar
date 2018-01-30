<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertise extends Model
{

	protected $fillable = [
	   'title' , 'description' , 'image' , 'price' , 'user_id' , 'category_id' , 'location_id'
	];

	protected $casts = [
		'image' => 'array'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
