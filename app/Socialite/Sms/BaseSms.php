<?php

namespace App\Socialite\Sms;


class BaseSms
{

	protected $username = '';

	protected $password = '';

	protected $URL = "http://panel.asanak.ir/webservice/v1rest";

	protected $function = '';

	protected $message = '';

	protected $Source = '';

	protected $destination = [];

	protected $sendTime = '';

	protected $jobId = '';

	protected $headers = [];

	protected $msgId= '';


	public function __construct()
	{
		$this->setUsername('vistavel');
		$this->setPassword('44672687');
		$this->setSource('982144672687');
		$this->setHeaders([
			'Accept: text/html',
			'Connection: Keep-Alive',
			'Content-type: application/x-www-form-urlencoded;charset=UTF-8'
		]);
	}

	/**
	 * @return array
	 */
	public function getMsgId(): string
	{
		return $this->msgId;
	}

	/**
	 * @param array $msgId
	 */
	public function setMsgId(string $msgId)
	{
		$this->msgId = $msgId;
	}

	/**
	 * @return string
	 */
	public function getUsername(): string
	{
		return $this->username;
	}

	/**
	 * @param string $username
	 */
	public function setUsername(string $username)
	{
		$this->username = $username;
	}

	/**
	 * @return string
	 */
	public function getPassword(): string
	{
		return $this->password;
	}

	/**
	 * @param string $password
	 */
	public function setPassword(string $password)
	{
		$this->password = $password;
	}

	/**
	 * @return string
	 */
	public function getURL(): string
	{
		return $this->URL;
	}

	/**
	 * @param string $URL
	 */
	public function setURL(string $URL)
	{
		$this->URL = $URL;
	}

	/**
	 * @return string
	 */
	public function getFunction(): string
	{
		return $this->function;
	}

	/**
	 * @param string $function
	 */
	public function setFunction(string $function)
	{
		$this->function = $function;
	}

	/**
	 * @return string
	 */
	public function getSource(): string
	{
		return $this->Source;
	}

	/**
	 * @param string $Source
	 */
	public function setSource(string $Source)
	{
		$this->Source = $Source;
	}

	/**
	 * @return array|string
	 */
	public function getDestination()
	{
		return $this->destination;
	}

	/**
	 * @param string $destination
	 */
	public function setDestination(string $destination)
	{
		$this->destination = $destination;
	}

	/**
	 * @return string
	 */
	public function getSendTime(): string
	{
		return $this->sendTime;
	}

	/**
	 * @param string $sendTime
	 */
	public function setSendTime(string $sendTime)
	{
		$this->sendTime = $sendTime;
	}

	/**
	 * @return string
	 */
	public function getJobId(): string
	{
		return $this->jobId;
	}

	/**
	 * @param string $jobId
	 */
	public function setJobId(string $jobId)
	{
		$this->jobId = $jobId;
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
	 * @return array
	 */
	public function getHeaders(): array
	{
		return $this->headers;
	}

	/**
	 * @param array $headers
	 */
	public function setHeaders(array $headers)
	{
		$this->headers = $headers;
	}

	protected function trimMessage($message)
	{
		return trim($message);
	}

	protected function urlEncodeMessage($message)
	{
		return urlencode($message);
	}

	public function getUrlTrimEncode()
	{
		$trim = $this->trimMessage($this->getMessage());

		$result = $this->urlEncodeMessage($trim);

		return $result;
	}

	public function getUrlWithParams()
	{
		return $this->getURL() . '/' . $this->getFunction() . '?' . $this->params();
	}

	protected function params()
	{
		if ($this->getFunction() == 'sendsms')
		{
			return 'username=' . $this->getUsername() . '&password=' . $this->getPassword() . '&source=' . $this->getSource() . '&destination=' . $this->getDestination() . '&message=' . $this->getUrlTrimEncode();
		}elseif ($this->getFunction() == 'msgstatus')
		{
			return 'username=' . $this->getUsername() . '&password=' . $this->getPassword() . '&msgid=' . $this->getMsgId();
		}

	}

	protected function initCurl()
	{
		return curl_init($this->getUrlWithParams());
	}

	protected function setOptCurl()
	{
		$process = $this->initCurl();
		curl_setopt($process, CURLOPT_HTTPHEADER, $this->getHeaders());
		curl_setopt($process, CURLOPT_HEADER, 0);
		curl_setopt($process, CURLOPT_TIMEOUT, 30);
		curl_setopt($process, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($process, CURLOPT_FOLLOWLOCATION, 1);

		return $process;
	}

	protected function execCurl()
	{
		return curl_exec($this->setOptCurl());
	}

	protected function convertDestinations(array $destinations)
	{
		$stringDestinations = "";

		foreach ($destinations as $key  => $destination)
		{
			if ($key == 0)
			{
				$stringDestinations .= $destination;
			}else {
				$stringDestinations .= '-'.$destination;
			}
		}

		return $stringDestinations;
	}

}