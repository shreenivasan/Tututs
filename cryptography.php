<?php

$private_key = openssl_get_privatekey(file_get_contents('private.key'));
$public_key = openssl_get_publickey(file_get_contents('public.pem'));

$data = '{"data":"makes life worth living"}';

echo "data in:\n$data\n\n";

$encrypted = $e = NULL;
openssl_seal($data, $encrypted, $e, array($public_key));

$sealed_data = base64_encode($encrypted);
$envelope = base64_encode($e[0]);

echo "sealed data:\n$sealed_data\n\n";
echo "envelope:\n$envelope\n\n";

$input = base64_decode($sealed_data);
$einput = base64_decode($envelope);

$plaintext = NULL;
openssl_open($input, $plaintext, $einput, $private_key);

echo "data out:\n$plaintext\n";