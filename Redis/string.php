<?php
   //Connecting to Redis server on localhost
   $redis = new Redis();
   $redis->connect('127.0.0.1', 6379);
   echo "Connection to server sucessfully";
   //set the data in redis string
   if(empty($redis->get("tutorial-name")))
   {
       $redis->set("tutorial-name", "Redis tutorial 2");
   }
   
   
   // Get the stored data and print it
   echo "<br>Stored string in redis:: ".$redis->get("tutorial-name");
