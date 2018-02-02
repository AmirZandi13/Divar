<?php

namespace App\Socialite\Email;


use App\Socialite\Socialite;
use App\Socialite\SocialiteInterface;
use App\User;

class Email extends BaseEmail implements SocialiteInterface
{


	public function sendSingle(array $receiver , string $message)
	{
		dd($receiver , $message);
	}

	public function sendGroup()
	{
		// TODO: Implement sendGroup() method.
	}
}