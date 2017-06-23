<?php
if (!@getimagesize('http://sandiperp.org/Staff/Staff_photo/1002.jpg'))
{
    echo "Y";
}
 else {
echo "N";    
}
die;
ini_set("display_errors", "Off");
include_once('mpdf.php');

$pdf =new mPDF();

$mpdf=new mPDF('c','A4','','',32,25,27,25,16,13); 

$mpdf->SetDisplayMode('fullpage');

$mpdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list

// LOAD a stylesheet
//$stylesheet = file_get_contents('mpdfstyletables.css');
//$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text


$html='<table width="70%" border="0" cellspacing="0" cellpadding="0" style="background: url(images/gatepass-bg.png) no-repeat;">
  <tr>
    <td valign="top" style="padding:10px"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="93%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="30%"><img src="images/sandip-logo-small.png"></td>
    <td><h2 style="color:#fff;font-family:ErasITC-Bold;font-size:2.5em;text-transform:uppercase;float:right">SANDIP FOUNDATION</h2>
<small style="color:#fff;font-family:ErasITC-Demi;font-size:2.5em;text-transform:uppercase;line-height: 0.5em; float:right">DANDIYA GATE PASS</small></td>
  </tr>
</table>
</td>
  </tr>
  <tr>
    <td style="padding-top:5%;color:#fff;font-family:ErasITC-Demi;font-size:15px;text-transform:uppercase;">
    <table width="70%" border="0" cellspacing="0" cellpadding="0" style="float:right">
  <tr>
    <td width="30%"><img src="images/profile-pic.jpg" width="108" height="135"></td>
    <td valign="top">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="color:#FFF;" >
  <tr>
    <td style="width:100px;">Student ID</td>
    <td>: SITRC001234</td>
  </tr>
  <tr>
    <td>Student Name</td>
    <td>: Avinash Ghogale</td>
  </tr>
  <tr>
    <td>College</td>
    <td>: SITRC </td>
  </tr>
  <tr>
    <td>Mobile No</td>
    <td>: 9930821468 </td>
  </tr>
  <tr>
    <td>Email ID</td>
    <td>: shreenivas11111111111111111111@gmail.com </td>
  </tr>
</table>
</td>
  </tr>
</table>
    </td>
  </tr>
  <tr>
    <td>
    <table width="93%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
 
    <tr style="background:rgba(0,0,0,0.5);color:#fff;font-family:ErasITC-Demi;">
    <td style="font-size:2.5em;padding:0px 20px;width:25%; border-right:1px solid #fff;text-align:center;color:#FFF">venue</td>
    <td style="font-size:1.3em;line-height:1em;padding:0px 20px;color:#FFF;">Sandip foundation<br>
Trimbak Road, Mahiravani,<br>
 Nashik, Maharashtra 422213</td>
    <td style="padding-top:-5%;padding-bottom:-5%"><img src="images/qrcode.jpg" class="img-responsive"></td>
  </tr>
</table>

    </td>
  </tr>
</table>
</td>
  </tr>
</table>';
echo $html; die;
$mpdf->WriteHTML($html);

$mpdf->Output();
exit;