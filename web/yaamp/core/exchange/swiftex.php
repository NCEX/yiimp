<?php

// https://swiftex.co/api/v2/tickers.json

function swiftex_api_query($method, $params='')
{
	$uri = "https://swiftex.co/api/v2/{$method}";
	if (!empty($params)) $uri .= "/{$params}";

	$ch = curl_init($uri);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
	curl_setopt($ch, CURLOPT_TIMEOUT, 30);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

	$execResult = strip_tags(curl_exec($ch));

	// array required for ticker "foreach"
	$obj = json_decode($execResult, true);

	return $obj;
}

