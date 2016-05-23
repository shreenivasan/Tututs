<?php

$url = "http://php.net/";
$content = curlRequest($url);
print $content;

function curlRequest($url) 
{
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
$response = curl_exec($ch);
$body = substr( $response, $header_size );
fclose($ch);
return $content;
}
