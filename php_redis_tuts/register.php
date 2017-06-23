<?php
session_start(); 
include("retwis.php");
//echo "<pre>"; print_r($_SESSION); print_r($_REQUEST); die;
# Form sanity checks
if(!isset($_POST['un']) || trim($_POST['un'])=="" )
{
    echo 'IU'; die;
}
if(!isset($_POST['pwd']) || trim($_POST['pwd'])=="" )
{
    echo 'IP'; die;
}
if(!isset($_POST['pwd2']) || trim($_POST['pwd2'])=="" )
{
    echo 'IP2'; die;
}
if(!isset($_POST['cc']) || trim($_POST['cc'])=="" )
{
    echo 'ICC'; die;
}
else if($_POST['cc'] != $_SESSION['digit'])
{
    echo 'IC'; die;
}
else 
{
    $username=trim($_POST['un']);
    $password=trim($_POST['pwd']);
    
    $r = redisLink();    
    if ($r->hget("users_php_redis",$username))
    {
        echo 'DU'; die;
    }
    else
    {
        $userid = $r->incr("next_user_id_php_redis");
        $authsecret = getrand();
        
        $r->hset("users_php_redis",$username,$userid);
        $r->hmset(
                    "user_php_redis:$userid",
                    "username",$username,
                    "password",$password,
                    "auth",$authsecret
                );
    $r->hset("auths_php_redis",$authsecret,$userid);
    
    $r->zadd("users_by_time_php_redis",time(),$username);

# User registered! Login her / him.
    setcookie("auth_php_redis",$authsecret,time()+3600*24*365);
    
    }
    echo 'Y';
}
    

