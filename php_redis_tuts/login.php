<?php
session_start(); 
include("retwis.php");
if(!isset($_POST['un']) || trim($_POST['un'])=="" )
{
    echo 'IU'; die;
}
if(!isset($_POST['pwd']) || trim($_POST['pwd'])=="" )
{
    echo 'IP'; die;
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
    $userid = $r->hget("users_php_redis",$username);
    
    if (!$userid)
    {
        echo 'IUP1'; die;
    }
    else 
    {
        $realpassword = $r->hget("user_php_redis:$userid","password");
        if ($realpassword != $password)
        {
            echo 'IUP2';die;
        }
        else
        {
            $authsecret = $r->hget("user_php_redis:$userid","auth");
            setcookie("auth_php_redis",$authsecret,time()+3600*24*365);
            echo 'Y';
        }
    }
    
    
    
}
