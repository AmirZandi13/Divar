<?php

namespace App\Socialite;

use App\User;
use App\Webservice;

class BaseSocialite
{

	protected $webservice = Webservice::class;

	protected $type = 'Sms';

	protected $subject = '';

	protected $message = '';

	protected $sender = 'system';

	protected $receiver = User::class;

	/**
	 * @return string
	 */
	public function getWebservice(): string
	{
		return $this->webservice;
	}

	/**
	 * @param string $webservice
	 */
	public function setWebservice(string $webservice)
	{
		$this->webservice = $webservice;
	}

	/**
	 * @return string
	 */
	public function getType(): string
	{
		return $this->type;
	}

	/**
	 * @param string $type
	 */
	public function setType(string $type)
	{
		$this->type = $type;
	}

	/**
	 * @return string
	 */
	public function getSubject(): string
	{
		return $this->subject;
	}

	/**
	 * @param string $subject
	 */
	public function setSubject(string $subject)
	{
		$this->subject = $subject;
	}

	/**
	 * @return string
	 */
	public function getMessage(): string
	{
		return $this->message;
	}

	/**
	 * @param string $message
	 */
	public function setMessage(string $message)
	{
		$this->message = $message;
	}

	/**
	 * @return string
	 */
	public function getSender(): string
	{
		return $this->sender;
	}

	/**
	 * @param string $sender
	 */
	public function setSender(string $sender)
	{
		$this->sender = $sender;
	}

	/**
	 * @return string
	 */
	public function getReceiver(): string
	{
		return $this->receiver;
	}

	/**
	 * @param string $receiver
	 */
	public function setReceiver(string $receiver)
	{
		$this->receiver = $receiver;
	}
}