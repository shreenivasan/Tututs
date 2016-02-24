<?php
include("retwis.php");

$r = redisLink();
if (!isLoggedIn() || !gt("uid") || gt("f") === false ||
    !($username = $r->hget("user_php_redis:".gt("uid"),"username"))) {
    header("Location:index.php");
    exit;
}

$f = intval(gt("f"));
$uid = intval(gt("uid"));
if ($uid != $User['id']) {
    if ($f) {
        $r->zadd("followers_php_redis:".$uid,time(),$User['id']);
        $r->zadd("following_php_redis:".$User['id'],time(),$uid);
    } else {
        $r->zrem("followers_php_redis:".$uid,$User['id']);
        $r->zrem("following_php_redis:".$User['id'],$uid);
    }
}
header("Location: profile.php?u=".urlencode($username));
?>
