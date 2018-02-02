<?php

namespace App\Socialite;


use App\Amir\view;
use App\User;
use Illuminate\Database\Eloquent\Model;

interface SocialiteInterface
{

	public function sendSingle(array $receiver, string $message);

	public function sendGroup();
}