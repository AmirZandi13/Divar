<?php

namespace App\Amir;

use Illuminate\Database\Eloquent\Model;

class view extends Model
{

	protected $table = 'views';

	protected $fillable = [
		'user_id' , 'advertise_id'
	];
}
