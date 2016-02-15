<?php
//Creates a csv file from an array 
$filename = "toy_csv.csv";
$fp = fopen('php://output', 'w');

$header=array("Sr.No","Fname","Lname","Status");

$myrows=array(array("1","A","B","Y"),array("2","C","D","N"));

header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);
fputcsv($fp, $header);

for($i=0;$i<count($myrows);$i++)
{
    fputcsv($fp, $myrows[$i]);
}
?> 