<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
      'name' , 'parent_id'
	];

	public function advertises()
	{
		return $this->hasMany(Advertise::class);
	}
}
