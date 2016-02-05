<?php
$mem = new Memcached();
$mem->addServer("127.0.0.1", 11211);

$result = $mem->get("blah");
if ($result) {
    echo $result;
} else {
    echo "No matching key found.  I'll add that now!";
    $mem->set("blah", "I am data!  I am held in memcached!") or die("Couldn't save anything to memcached...");
}   

mysql_connect("localhost", "root", "") or die(mysql_error());
mysql_select_db("test") or die(mysql_error());

$query = "SELECT id FROM toy WHERE name = 'Music Aeroplane'";
$querykey = "KEY" . md5($query);

$result = $mem->get($querykey);

if ($result) 
{
    print "<p>Data was: " . $result[0] . "</p>";
    print "<p>Caching success!</p><p>Retrieved data from memcached!</p>";
} else {
    $result = mysql_fetch_array(mysql_query($query)) or die(mysql_error());
    $mem->set($querykey, $result, 10);
    print "<p>Data was: " . $result[0] . "</p>";
    print "<p>Data not found in memcached.</p><p>Data retrieved from MySQL and stored in memcached for next time.</p>";
}   

//include_once 'memcache.php';
//ini_set("display_errors", "on");
//include('db.php');
//$memcache = new Memcache;
//$memcache->connect('localhost', 11211) or die ("Could not connect");
//
//$key = md5('List 9lessons Demos'); // Unique Words
//$cache_result = array();
//$cache_result = $memcache->get($key); // Memcached object 
//
//if($cache_result)
//{
//// Second User Request
//$demos_result=$cache_result;
//}
//else
//{
//// First User Request 
//$v=mysql_query("select * from demos order by id desc");
//while($row=mysql_fetch_array($v))
//$demos_result[]=$row; // Results storing in array
//$memcache->set($key, $demos_result, MEMCACHE_COMPRESSED, 1200);
//// 1200 Seconds
//}
//
//// Result
//foreach($demos_result as $row)
//{
//echo '<a href='.$row['link'].'>'.$row['title'].'</a>';
//}