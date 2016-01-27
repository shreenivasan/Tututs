<?php
mysql_connect("localhost","root","root");
mysql_select_db("sinfra");
$table="tenders";

$totalRecords = using_mysql_find_out ("Select count(*) from $table");
 
include 'paginator.php';
$paginator = new Paginator();
$paginator->total = $totalRecords;
$paginator->paginate();

//get record from database and show
$records = using_mysql_find_out ("Select (*) from $table LIMIT ($paginator->currentPage-1)*$paginator->itemsPerPage,  $paginator->itemsPerPage") ;

//using mysql to find out total records
$totalRecords = using_mysql_find_out ("Select count(*) from $table");
 
include 'paginator.php';
$paginator = new Paginator();
$paginator->total = $totalRecords;
$paginator->paginate();
 
//get record from database and show
$records = using_mysql_find_out ("Select (*) from $table LIMIT ($paginator->currentPage-1)*$paginator->itemsPerPage,  $paginator->itemsPerPage" );
 
//print
echo $paginator->pageNumbers();
echo $paginator->itemsPerPage();
