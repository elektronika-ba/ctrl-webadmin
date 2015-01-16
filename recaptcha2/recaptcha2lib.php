<?php

// ReCaptcha v2 lib functions
/////////////////////////////

define("RECAPTCHA2_VERIFY_URL", "https://www.google.com/recaptcha/api/siteverify");

function recaptcha2_verify($secretKey, $response, $ip) {
	$url = RECAPTCHA2_VERIFY_URL."?secret=".$secretKey."&response=".$response."&remoteip=".$ip;
	$res = recaptcha2_getCurlData($url);
	$res = json_decode($res, true);
	return( isset($res['success']) && $res['success'] );	
}

function recaptcha2_getCurlData($url)
{
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_TIMEOUT, 10);
	curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.16) Gecko/20110319 Firefox/3.6.16");
	$curlData = curl_exec($curl);
	curl_close($curl);
	return $curlData;
}

?>