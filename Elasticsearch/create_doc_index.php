<?php
ini_set("display_errors", "On");
$search_host = '127.0.0.1';
$search_port = '9200';
$index = 'twitter';
$doc_type = 'tweet';

for($i=1;$i<=10;$i++)
{
    $doc_id = $i;
    $json_doc = array(
                "My_custom_id"=>"CUSTOM-".$i,
                "user" => "kimchy",
                "post_date" => "2012-11-15T14:12:12",
                "message" => "trying out Elastic Search"
            );
    $json_doc = json_encode($json_doc);

    $baseUri = 'http://'.$search_host.':'.$search_port.'/'.$index.'/'.$doc_type.'/'.$doc_id;

    $ci = curl_init();
    curl_setopt($ci, CURLOPT_URL, $baseUri);
    curl_setopt($ci, CURLOPT_PORT, $search_port);
    curl_setopt($ci, CURLOPT_TIMEOUT, 200);
    curl_setopt($ci, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ci, CURLOPT_FORBID_REUSE, 0);
    curl_setopt($ci, CURLOPT_CUSTOMREQUEST, 'PUT');
    curl_setopt($ci, CURLOPT_POSTFIELDS, $json_doc);
    echo  $response = curl_exec($ci);
    echo "<br>";
}



    