<?php

namespace App\Socialite\Sms;


use App\Socialite\SocialiteInterface;
use App\User;

class Sms extends BaseSms implements SocialiteInterface
{

	protected $status = [
		1 => 'pending' ,
		2 => 'sent' ,
		3 => 'partially failed' ,
		4 => 'partially success' ,
		5 => 'failed' ,
		6 => 'success'
 	];

	public function sendSingle(array $receiver , string $message)
	{
		$this->setMessage($message);

		$this->setFunction('sendsms');

		dd($receiver);

//		$this->setDestination($destination);

		return $this->execCurl();
	}

	public function sendGroupSms(array $destinations , string $message)
	{
		$this->setMessage($message);

		$this->setDestination($this->convertDestinations($destinations));

		$this->setFunction('sendsms');

		return $this->execCurl();
	}

	public function messageStatus(string $msgId)
	{
		$this->setFunction('msgstatus');

		$this->setMsgId($msgId);

		$result = json_decode($this->execCurl() , true);

		$result = $result[0];

		return $result;
	}

	public function sendGroup()
	{
		// TODO: Implement sendGroup() method.
	}
}