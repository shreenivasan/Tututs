<?php
include("retwis.php");

if (!isLoggedIn()) {
    header("Location: index.php");
    exit;
}

$r = redisLink();
$newauthsecret = getrand();
$userid = $User['id'];
$oldauthsecret = $r->hget("user_php_redis:$userid","auth");

$r->hset("user_php_redis:$userid","auth",$newauthsecret);
$r->hset("auths_php_redis",$newauthsecret,$userid);
$r->hdel("auths_php_redis",$oldauthsecret);

header("Location: index.php");
?>
