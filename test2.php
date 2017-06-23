<?php
$i = 13/ 1200;
$p = 24999;
$n = 6;

echo get_principle_amt($p,$i,$n);
echo "<br>";




function get_principle_amt($p,$i,$n)
{
    return round($p * ( 1 - pow((1 + $i ), (-$n)) ) / ($i * $n),2);
}

echo $p-get_principle_amt($p,$i,$n);
//Emi discount = Principal amount - Total Cart value

//Emi interest  = Total Cart value - Principal amount
?>