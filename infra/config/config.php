<?php

define("DS", "/");

define("SITE_URL","http://".$_SERVER['HTTP_HOST'].DS."Tututs/infra" );

define("DBHOST","localhost");

define("DBUSER","root");

define("DBPASSWORD","");

define("DBNAME","infra");

define("REDIS_HOST","127.0.0.1");

define("REDIS_PORT","6379");

define("JS",SITE_URL.DS."js" );

define("CSS",SITE_URL.DS."css" );

session_start();

include_once 'common/functions.php';