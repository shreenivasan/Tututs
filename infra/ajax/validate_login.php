<?php
include_once '../common/ajax_header.php';
global $redis;

$post=  isset($_POST)?$_POST:"";

$flag=isLoggedIn($post['un']);

echo $flag;
