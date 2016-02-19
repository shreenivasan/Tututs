<?php
<<<<<<< HEAD

   //Connecting to Redis server on localhost
=======
ini_set("display_errors", "On");
error_reporting(E_ALL);
//Connecting to Redis server on localhost
>>>>>>> testing1
   $redis = new Redis();
   $redis->connect('127.0.0.1', 6379);
   echo "Connection to server sucessfully";
   //check whether server is running or not
<<<<<<< HEAD
   echo "Server is running: "+ $redis->ping();

=======
   echo "Server is running: ". $redis->ping();
>>>>>>> testing1
