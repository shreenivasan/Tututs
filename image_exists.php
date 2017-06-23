<?php

function remote_file_exists($file){

$url=getimagesize($file);

if(is_array($url))
{

 return true;

}
else {

 return false;

}
}

$file='http://i1.pepperfry.com/media/catalog/product/c/a/800x400/canon-red-recliner-by-alcanes-canon-red-recliner-by-alcanes-u6yqbb.jpg';
$file2='http://i1.pepperfry.com/media/catalog/product/c/a/800x880/canon-red-recliner-by-alcanes-canon-red-recliner-by-alcanes-u6yqbb.jpg';
echo remote_file_exists($file)?"Y":"N";
echo remote_file_exists($file2)?"Y":"N";
