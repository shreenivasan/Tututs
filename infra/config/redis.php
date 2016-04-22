<?php
include_once 'config.php';

$redis = new Redis();
$redis->connect('127.0.0.1', 6379);
