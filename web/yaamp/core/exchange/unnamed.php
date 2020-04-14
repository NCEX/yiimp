<?php
	//https://api.unnamed.exchange/v1/
function unnamed_api_query($method, $params='')
{
	$uri = "https://api.unnamed.exchange/v1/Public/$method";
	
	$ch = curl_init($uri);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
	curl_setopt($ch, CURLOPT_TIMEOUT, 30);

	$res = curl_exec($ch);
	$result = json_decode($res);
	if(!is_object($result) && !is_array($result)) {
		$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		debuglog("unnamed: $method failed ($status) ".strip_data($res));
	}

	curl_close($ch);
	return $result;
}

