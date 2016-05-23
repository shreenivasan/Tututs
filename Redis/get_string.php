<?php
//Connecting to Redis server on localhost
   $redis = new Redis();
   $redis->connect('127.0.0.1', 6379);
   echo "Connection to server sucessfully";
   //set the data in redis string
   $key=$redis->get("mykey");
   
   if(!empty($key))
   {
       echo $key;
   }
   else 
   {
     echo "mykey contains null value.";
   }

