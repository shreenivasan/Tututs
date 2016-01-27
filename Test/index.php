<?php

$hostname = "localhost";
$username = "carrot_dandiya";
$password = "Mg(k0W)cA3-q"; 
$db = "carrot_dandiya"; 

$error="F";

$rand=rand();
 
$dbhandle = mysql_connect($hostname, $username, $password);
if (!$dbhandle){
	echo 'Unable to Connect DB';
}
else{
    mysql_select_db($db);
}

echo $sql="SELECT * FROM pass_details WHERE college='SP' LIMIT 2 ";

$res=mysql_query($sql);

$array=array();
while($row=mysql_fetch_assoc($res))
{
 $array[]=$row;   
}

require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Sandip Foundation');
$pdf->SetTitle('Sandip Foundation');

// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 021', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 9);

// add a page
$pdf->AddPage();

 for($i=0;$i<count($array);$i++)
 {
 
// create some HTML content
$html = '<table width="90%" border="1" cellspacing="0" cellpadding="0" style="background-color: #252c80; height:479px;padding:10px;border:2px solid #C06; border-radius:8px !important; margin:0 auto">
  <tr>
    <td valign="top" style="padding:10px"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="35%"><img src="http://dandiya.carrottech.in/images/sandip-logo-small.png"></td>
    <td><h2 style="color:#fff;font-family:ErasITC-Bold;font-size:2em;text-transform:uppercase;float:right">SANDIP FOUNDATION</h2>
<small style="color:#fff;font-family:ErasITC-Demi;font-size:1.5em;text-transform:uppercase;line-height: 0.5em; float:right">DANDIYA GATE PASS</small></td>
  </tr>
</table>
</td>
  </tr>
  <tr>
    <td style="padding-top:5%;color:#fff;font-family:ErasITC-Demi;font-size:15px;text-transform:uppercase;">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="float:right">
  <tr>
    <td width="25%"><img src="'.$array[$i]['img'].'" width="200" height="135"></td>
    <td valign="top">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>Student ID</td>
    <td>: '.$array[$i]['sid'].'</td>
  </tr>
  <tr>
    <td>Student Name</td>
    <td>: '.$array[$i]['name'].'( Student Type - Regular)</td>
  </tr>
  <tr>
    <td>College</td>
    <td>: '.$array[$i]['college'].' </td>
  </tr>
  <tr>
    <td>Mobile No</td>
    <td>: '.$array[$i]['mobile'].' </td>
  </tr>
  <tr>
    <td>Email</td>
    <td>: '.$array[$i]['email'].' </td>
  </tr>
  </table>
</td>
  </tr>
</table>
    </td>
  </tr>
  <tr>
    <td>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
    <tr style="background:rgba(0,0,0,0.5);color:#fff;font-family:ErasITC-Demi;">
    <td style="font-size:2.2em;padding:0px 20px;width:15%; border-right:1px solid #fff;text-align:center">venue</td>        
    <td style="font-size:1.3em;;padding:0px 10px;width:50%" >
    <center>
    <table width="100%" height="50px" style="top:50px;" >
       <tr height="20px">
          <td>Sandip foundation</td>
       </tr>
       <tr>
          <td>Trimbak Road, Mahiravani,</td>
       </tr>
       <tr>
          <td>Nashik, Maharashtra 422213.</td>
       </tr>
       </table>
       </center>
    </td>
    <td style="padding-top:-5%;padding-bottom:-5%">
    <img  src="https://chart.googleapis.com/chart?chs=140x139&cht=qr&chl=http://dandiya.carrottech.in/my_details.php?id='.base64_encode($array[$i]['sid']).'&choe=UTF-8" class="img-responsive"/>    
    </td>
  </tr>
</table>

    </td>
  </tr>
</table>
</td>
  </tr>
</table>';
//echo $html; die;
// output the HTML content
$pdf->writeHTML($html, true, 0, true, 0);

// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output($_SERVER['DOCUMENT_ROOT']."tcpdf/examples/SP/".$array[$i]['sid'].'.pdf', 'F');
}
 ?>