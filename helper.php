<?php

class UrlXParam
{
	public $key, $value;

	public function __construct(string $key, string $value)
	{
		$this->key   = $key;
		$this->value = $value;
	}

	public function to_string()
	{
		return "$this->key=$this->value";
	}
}

class UrlX
{
	private $url;
	private $status_code;

	public function __construct(string $url, UrlXParam $first_param, UrlXParam $second_param)
	{
		$this->url = "$url?" . $first_param->to_string() . "&" . $second_param->to_string();
	}

	public function getHTML(): string
	{
		$curl_handle = curl_init();

		curl_setopt($curl_handle, CURLOPT_URL, $this->url);
		curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);

		$html               = curl_exec($curl_handle);
		$this->status_code  = curl_getinfo($curl_handle, CURLINFO_HTTP_CODE);

		curl_close($curl_handle);

		if ($this->status_code < 200 || $this->status_code >= 300)
		{
			return '<div style="
                            color            : red !important;
                            border           : 2px solid red;
                            background-color : #f6e7ec;
                            border-radius    : 10px;
                            padding          : 14px;
                            margin-bottom    : 16px;
                            ">
                        Requested URL not found or maybe an error occurred!<br>
                        HTTP status code: ' . $this->status_code . ' 
                    </div>';
		}
		return $html;
	}
}
