<?php

function isLoggedIn($username) 
{
    global $redis;
    $key = "users";
    if($username=="" || !filter_var($username, FILTER_VALIDATE_EMAIL))
    {
        return false;
    }
    else
    {
        //checks whether users set contains $username or not
        return $redis->sismember($key, $username);
    }
}
