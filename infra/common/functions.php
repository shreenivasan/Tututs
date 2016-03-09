<?php

function isLoggedIn($username) 
{
    if($username!="" || !filter_var($username, FILTER_VALIDATE_EMAIL))
    {
        return false;
    }
    global $redis;
    print_r($redis);
}
