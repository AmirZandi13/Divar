<?php

namespace App\Socialite;

class Socialite extends BaseSocialite
{

	protected $socialite;

	public function __construct($webservice , $type , $message , $sender , $receiver)
	{
		$this->setWebservice($webservice);
		$this->setType($type);
		$this->setMessage($message);
		$this->setSender($sender);
		$this->setReceiver($receiver);
	}

	public function socialite()
	{
		$webservice = $this->getWebservice();
		$this->socialite = new $webservice;
		$reciever = json_decode($this->getReceiver() , true);
		return $this->socialite->sendSingle($reciever , 'amir');
	}


}