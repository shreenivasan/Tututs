<?php
ini_set("display", "On");
ini_set("max_execution_time",0);
error_reporting(1);
ini_set('memory_limit', '1024M');
require_once 'excel_reader2.php';
$data = new Spreadsheet_Excel_Reader("OBC_Freeship.xls");
$conn=mysql_connect("localhost","root","root");
mysql_select_db("new_erp");

$parent_id=0;
//echo "<pre>";
////print_r(($data->sheets[0]['cells'][1])); 
//print_r(($data->sheets[0]['cells'][620])); 
//die;
//
//for($m=1;$m<count($data->sheets[0]['cells'][2]);$m++)
//{
//    echo $data->sheets[0]['cells'][1][$m]."   ===> ".$data->sheets[0]['cells'][2][$m]."  <br>";
//}
//
//die;
function get_column_names($array,$tbl_name)
{
    $str="INSERT INTO $tbl_name ( ";
    
    for($i=1;$i<=count($array);$i++)
    {
        $str.="`".str_replace("'", "",$array[$i])."`,";
    }
    
    $str=rtrim($str,",");
    $str.=" ) VALUES ";
    return $str;
}

//echo get_column_names($data->sheets[0]['cells'][1]);
//echo "<pre>";
for($i=2;$i<=count($data->sheets[0]['cells']);$i++)
{
    $str1=get_column_names($data->sheets[0]['cells'][1],"scholorship_details");
    $str1.="(";
    for($j=1;$j<=count($data->sheets[0]['cells'][$i]);$j++)
    {
       // print_r($data->sheets[0]['cells'][$i]);
        if(strlen(trim(str_replace("'", "",$data->sheets[0]['cells'][$i][$j])))==0)
        {
            $str1.="NULL,";    
        }
        else
        {
            $str1.="'".trim(addslashes(str_replace("'", "",$data->sheets[0]['cells'][$i][$j])))."',";    
        }
        
        
//        if($data->sheets[0]['cells'][$i][$j]!="NULL" || $data->sheets[0]['cells'][$i][$j]!="")
//        {
//            $str1.="'".trim($data->sheets[0]['cells'][$i][$j])."',";    
//        }
//        else 
//        {
//            $str1.="'NULL',";    
//        }
        
    }    
    $str1=rtrim($str1,",");
    $str1.=")";
    
    echo $str1."<br>";
    mysql_query($str1) or die(mysql_error()); 
    
    
//    if(!mysql_query($str1))
//    {
//        mysql_query("insert into sm_error_log(sid) values('".$data->sheets[0]['cells'][$i][1]."')") or die;
//    }
//    else
//    {
//        echo die(mysql_error());
//    }
}
//die;