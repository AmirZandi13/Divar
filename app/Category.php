<?php

namespace App;

use Baum\Node;


class Category extends Node
{

	public function advertises()
	{
		return $this->hasMany(Advertise::class);
	}
}
