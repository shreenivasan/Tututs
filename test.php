<?php
ini_set("display_errors", "On");
echo "<pre>";
$con=  mysql_connect("192.168.0.43","eadmin","e@dm!n@123");
mysql_select_db("trendsutra3");

 $query1="SELECT SUM(sfoi.qty_ordered) qty, sfoi.sku";
            $query1.=" FROM sales_flat_order sfo";
            $query1.=" INNER JOIN sales_flat_order_item sfoi ON sfo.entity_id = sfoi.order_id";
            $query1.=" WHERE sfo.status IN ('pending_verification' , 'hold', 'pending_payment_user_confirmed', 'pre_order', 'waiting_authorization')";
            $query1.=" AND sfo.created_at BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 MONTH, '%Y-%m-%d %h :%i:%s') AND NOW()";
            $query1.=" GROUP BY sfoi.sku ";   
            
$result= mysql_query($query1,$con);

$rows=array();

while($row= mysql_fetch_assoc($result))
{
    $rows[]=$row;
    echo "key ===> ".in_array("AH1000059-P-OD1361", $row)?"Y":"N";
    echo "<br>";
}

print_r($rows);

die;

$cur_date =array('year'=>'2016','mon'=>'11','mday'=>15,'hours'=>'17','minutes'=>'01','seconds'=>'01');

function get_orders($cur_date)
{
    $y= $cur_date['year'];
    $m= $cur_date['mon'];
    $d= $cur_date['mday'];

    $h = $cur_date['hours'];
    $mi = $cur_date['minutes'];
    $s = $cur_date['seconds'];
    
    echo $y.'-'.$m.'-'.$d.' '.$h.':'.$mi.':'.$s;
    echo '<br>';
    
    if($h < 7)
    {
        $where1.=" WHERE ( sfo.created_at between '".$y."-".$m."-".($d-1)." 15:00:00' AND '$y-$m-".($d)." 06:59:59' OR  sfo.updated_at between '".$y."-".$m."-".($d-1)." 15:00:00' AND '$y-$m-".($d)." 06:59:59' )";
        $where2.= " WHERE ( sfoi.created_at between '".$y."-".$m."-".($d-1)." 15:00:00' AND '$y-$m-".($d)." 06:59:59' )"; 
        $where3.= " WHERE ( ts_sfoi.updated_at '".$y."-".$m."-".($d-1)." 15:00:00' AND '$y-$m-".($d)." 06:59:59' ) ";
    }
    else if( $h == 7 ||( $h>7 && $h <12))
    {
        $where1.=" WHERE  ( sfo. created_at between '".$y."-".$m."-".$d." 07:00:00' AND '$y-$m-$d 11:59:59' OR sfo. updated_at between '".$y."-".$m."-".$d." 07:00:00' AND '$y-$m-$d 11:59:59' ) ";
        $where2.= " WHERE ( sfoi.created_at between '".$y."-".$m."-".$d." 07:00:00' AND '$y-$m-$d 11:59:59' ) ";
        $where3.= " WHERE ( ts_sfoi.updated_at between '".$y."-".$m."-".$d." 07:00:00' AND '$y-$m-$d 11:59:59' ) ";
    }
    else if(($h > 15 ) || ($h ==15 && $s>1))
    {
        $where1.=" WHERE ( sfo.created_at between '".$y."-".$m."-".$d." 03:00:00' AND '$y-$m-".($d+1)." 06:59:59' OR sfo.updated_at between '".$y."-".$m."-".$d." 03:00:00' AND '$y-$m-".($d+1)." 06:59:59' )";
        $where2.= " WHERE (sfoi.created_at between '".$y."-".$m."-".$d." 03:00:00' AND '$y-$m-".($d+1)." 06:59:59' ) ";
        $where3.= " WHERE ( ts_sfoi.updated_at between '".$y."-".$m."-".$d." 03:00:00' AND '$y-$m-".($d+1)." 06:59:59' ) ";
    }
    else
    {
        $where1.=" Where ( sfo.created_at between '".$y."-".$m."-".$d." 12:00:00' AND '$y-$m-$d 14:59:59' OR sfo.updated_at between '".$y."-".$m."-".$d." 12:00:00' AND '$y-$m-$d 14:59:59')";
        $where2.= " WHERE (sfoi.created_at between '".$y."-".$m."-".$d." 12:00:00' AND '$y-$m-$d 14:59:59' )";
        $where3.= " WHERE ( ts_sfoi.updated_at  between '".$y."-".$m."-".$d." 12:00:00' AND '$y-$m-$d 14:59:59' ) ";
    }
    
    $sql="  SELECT entity_id
            FROM (  SELECT sfo.entity_id, sfo.increment_id
                    FROM sales_flat_order sfo
                    $where1    
                    UNION
                    SELECT  sfo.entity_id, sfo.increment_id
                    FROM sales_flat_order_item sfoi
                    LEFT JOIN sales_flat_order sfo ON (sfoi.order_id = sfo.entity_id)
                    $where2    
                    UNION
                    SELECT  sfo.entity_id, sfo.increment_id
                    FROM ts_sales_flat_order_item ts_sfoi
                    LEFT JOIN sales_flat_order_item sfoi ON (ts_sfoi.item_id = sfoi.item_id)
                    LEFT JOIN sales_flat_order sfo ON (sfoi.order_id = sfo.entity_id)
                     $where3  
                 ) t1
            GROUP BY entity_id
            ORDER BY entity_id DESC";
    
            echo $sql; die;
            $result = mysql_query($sql);
            $ids='';
            while($row= mysql_fetch_array($result))
            {
                $ids.= "'".$row['entity_id']."',";
            }
            
            return rtrim($ids,",");
}


echo '<br>';
print_r(get_orders($cur_date));







echo $sql; die;


$where = " WHERE 1=1 ";



//echo $where." @@@@@@@@@@2"; die;
while($row= mysql_fetch_array($result))
{
    print_r($row);
}


?>