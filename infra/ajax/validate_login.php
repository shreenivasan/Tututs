<?php
include_once '../common/ajax_header.php';

$post=  isset($_POST)?$_POST:"";

//check whether user is already login or not
$redis_uid=isLoggedIn($post['un']);

//if found in redis then check for password & status field
// otherwise check in database 
if($redis_uid)
{
    $key="user:".$redis_uid;
    $data = $redis->hgetall($key);
    
    if($data['username']==$post['un'] && $data['password']==md5($post['pwd']))
    {
        if($data['status']!="Y")
        {
            echo "AD";
        }
        else
        {
            echo "Y";
        }
        
    }
    else
    {
        echo "IUP";
    }
}
else
{    
    ini_set("display_errors","On");
    global $conn;
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt = $conn->prepare("SELECT id,fname,lname,username,status FROM users WHERE username='".$post['un']."' and password='".md5($post['pwd'])."'");
  
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $data=  array_shift($stmt->fetchAll());
    if($data['status']!="Y")
    {
        echo "AD";
    }
    else
    {
        echo "Y";
    }   
}