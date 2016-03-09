<?php
include_once 'config.php';
try 
{
    $conn = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
}
catch(PDOException $e)
{
   // echo "Connection failed: " . $e->getMessage();
}

