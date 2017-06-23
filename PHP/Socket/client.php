<?php
ini_set("display_errors", "on");
//$host_array=array('192.168.12.241');
$host_array=array('10.0.1.4');
$port=7777;
$session_id=session_id();
$ip_addr=(isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR']!="")?$_SERVER['REMOTE_ADDR']: "";
$postdata = json_encode(array("session_id1"=>$session_id,"ip_address"=>$ip_addr));


foreach ($host_array as $key=>$host)
{
    $sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

    if(!$sock)
    {
        continue;
    }

    $result = socket_connect($sock, $host, $port);  

    if(!$result)
    {
        continue;
    }

    socket_write($sock, $postdata);
    $result = socket_read ($sock, 1024);

    $result=  json_decode($result,true);
print_r($result);
    if(in_array($result['message'], array('success','failed')))
    {
        break;
    }
}
            
            

//$host    = "192.168.12.241";
//$port    = 7777;
//$message = "Hello Server";
//echo "Message To server :".$message;
//// create socket
//$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
//// connect to server
//$result = socket_connect($socket, $host, $port) or die("Could not connect to server\n");  
//// send string to server
//socket_write($socket, $message, strlen($message)) or die("Could not send data to server\n");
//// get server response
//$result = socket_read ($socket, 1024) or die("Could not read server response\n");
//echo "Reply From Server  :".$result;
//// close socket
//socket_close($socket);

