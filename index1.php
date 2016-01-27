<?php
//this comment
mysql_connect("localhost","root","root");
mysql_select_db("sinfra");
$sql="select id,req_id,item_desc from requisition_details "; 
$res=  mysql_query($sql);
while($row=  mysql_fetch_assoc($res))
{
    mysql_query("update requisition_details set item_desc='".addslashes($row['item_desc'])."' where id='".$row['id']."'");
}