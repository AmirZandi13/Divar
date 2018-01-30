<?php


namespace App\Socialite;


class Socialite extends BaseSocialite
{

	public function __construct($webservice , $type , $message , $sender , $receiver)
	{
		$this->setWebservice($webservice);
		$this->setType($type);
		$this->setMessage($message);
		$this->setSender($sender);
		$this->setReceiver($receiver);
	}

}