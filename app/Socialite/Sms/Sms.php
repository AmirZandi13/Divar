<?php

namespace App\Socialite\Sms;


class Sms extends BaseSms
{

	protected $status = [
		1 => 'pending' ,
		2 => 'sent' ,
		3 => 'partially failed' ,
		4 => 'partially success' ,
		5 => 'failed' ,
		6 => 'success'
 	];

	public function sendSingleSms(string $destination , string $message)
	{
		$this->setMessage($message);

		$this->setFunction('sendsms');

		$this->setDestination($destination);

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

}