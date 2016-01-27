<?php
include "BarcodeQR.php";

// set BarcodeQR object
$qr = new BarcodeQR();

// create URL QR code
$qr->url("http://sandiperp.org/SITRC/studentPhoto/112015168.jpg| Name :Shree| Mobile : 9999 |");

// display new QR code image
echo "<img src='".$qr->draw()." />";
