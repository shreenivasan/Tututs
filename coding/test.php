<?php
$new_array=$_REQUEST;
date_default_timezone_set('Asia/Kolkata');



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
//echo "@@@".$_POST['status']."$$";

function check_duplicate($sid)
{
   $sql="SELECT count(*) as cnt from pass_details where sid='".$sid."'";
   
  $res= mysql_query($sql);
  if($res)
  {
	  $row=mysql_fetch_array($res); 	    
	  return $row['cnt'];
  }

}


if(isset($_POST['status']) && trim($_POST['status'])=="r"  )
{

   if(check_duplicate($_REQUEST['sid'])>0)
   {
?>
    <!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Dandiya Night</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>



<div class="row login-form">
    <div class="container">        
        <div class="col-lg-12 sand-logo"><img src="images/sandip-logo.png" class="img-responsive"></div>
        <div class="col-lg-5 form-bg">
        <div class="fb-page" data-href="https://www.facebook.com/SandipFoundationIndia" data-width="395px" data-height="530px" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="true" data-show-posts="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/SandipFoundationIndia"><a href="https://www.facebook.com/SandipFoundationIndia">Sandip Foundation</a></blockquote></div></div>
        </div>
        <div class="col-lg-7 form-bg">
            <table style="width:100%;height:529px;">
                <tr><td style="color:#FFF;font-weight:bold;font-size:20px;">Dandiya Gate Pass is already sent to your registered email id..</td></tr>
            </table>
        </div>
    </div>
</div>
<script src="js/jquery.min.js"></script> 
<script src="js/bootstrap.js"></script> 
</body>
</html>
<?php
die;
   }
   else
   {
   
      if(isset($_FILES['fileToUpload']['name']))
      {
      		$file_name=$rand."_".$_FILES['fileToUpload']['name'];

        $target_dir = "uploads/";
        $target_file = $target_dir .$rand."_".basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) 
        {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
               // echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
               // echo "File is not an image.";
                $uploadOk = 0;
            }
        }
    // Check if file already exists
    if (file_exists($target_file)) {
      //  echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
      //  echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
       // echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } 
    else 
    {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
          //  echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } else {
           // echo "Sorry, there was an error uploading your file.";
        }
    }
      }
      else
      {
         $file_name="http://sandiperp.org/SITRC/studentPhoto/".$_REQUEST['sid'].".jpg";
      }	
       
   }



$sql="INSERT INTO pass_details(sid,name,college,img,email_id,mobile,inserted_datetime) VALUES('".$new_array['sid']."','".$new_array['name']."','".$new_array['college']."','"."http://sandiperp.org/SITRC/studentPhoto/".$file_name."','".$new_array['email']."','".$new_array['mobile']."','".date("Y-m-d H:i:s")."')";


$res=mysql_query($sql);
$cnt=mysql_insert_id();
if($cnt)
{
  $error="T";
  //unset($_REQUEST);
}
else
{
  $error="F";
}
if($error=="T")
{
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Dandiya Night</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>

<div class="row" style="background:url('images/login-bg.jpg');">
<div class="container">
    
<!--    <div style="display:none;" id="ajax_loader"><img src="images/loader.gif"></div>-->
    
    
<div class="col-lg-12 sand-logo"><img src="images/sandip-logo.png" class="img-responsive"></div>
<div class="col-lg-12 form-bg">
<div class="gatepass-bg">
<div class="col-lg-3"><img src="images/sandip-logo-small.png" class="img-responsive"></div>
<div class="col-lg-9 heading"><h2>SANDIP FOUNDATION</h2>
<small class="heading-two pull-right">DANDIYA GATE PASS</small>
</div>
<div class="col-lg-5"></div>
<div class="col-lg-7 user-info" style="">
<table width="95%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="25%"><img src="uploads/<?=$file_name?>" width="108" height="135"></td>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>Student ID</td>
    <td>: <?=$new_array['sid']?></td>
  </tr>
  <tr>
    <td>Student Name</td>
    <td>: <?=$new_array['name']?></td>
  </tr>
  <tr>
    <td>College</td>
    <td>: <?=$new_array['college']?></td>
  </tr>
  <tr>
    <td>Mobile No</td>
    <td>: <?=$new_array['mobile']?></td>
  </tr>
</table>
</td>
  </tr>
</table>


</div>
<div class="col-lg-12 bottom-bg">
<ul class="list-inline list-unstyled">
<li style="font-size:3em;padding:0px 20px">venue</li>

<li style="font-size:1.7em;line-height:1em;padding:0px 20px">Sandip foundation<br>
Trimbak Road, Mahiravani,<br>
 Nashik, Maharashtra 422213</li>

<li class="pull-right" style="margin-top:-5%;margin-bottom:-5%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
    <?php $str="Name : ".$new_array['name']."| SID : ".$new_array['sid']." | College : ".$new_array['college']." | "." Mobile : ".$new_array['mobile']." | <img scr='http://www.carrottech.in/dandiya/uploads/".$file_name."'>"; ?>
     <img  src="https://chart.googleapis.com/chart?chs=140x139&cht=qr&chl=<?=$str?>&choe=UTF-8" class="img-responsive"/>
</td>
  </tr>
</table>
</li>


</ul>

</div>
</div>

</div>

</div>
<div style="margin-top:10px;"><center>
<input type="button" id="btnPrint" name="emailBtn" style="border:1px solid black;" value="GET Email"/>

</center></div>
</div>
</div>



<script src="js/jquery.min.js"></script> 
<script src="js/bootstrap.js"></script> 
</body>


</html>

<?php
}
}
else
{
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Dandiya Night</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>



<div class="row login-form">
    <div class="container">
        <div class="col-lg-12 sand-logo"><img src="images/sandip-logo.png" class="img-responsive"></div>
        <div class="col-lg-5 form-bg">
        <div class="fb-page" data-href="https://www.facebook.com/SandipFoundationIndia" data-width="395px" data-height="530px" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="true" data-show-posts="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/SandipFoundationIndia"><a href="https://www.facebook.com/SandipFoundationIndia">Sandip Foundation</a></blockquote></div></div>
        </div>
        <div class="col-lg-7 form-bg">
            <table style="width:100%;height:529px;">
                <tr><td style="color:#FFF;font-weight:bold;font-size:20px;">Sorry! This gate pass is facilitated only to the current students studying at Sandip Foundations.</td></tr>
            </table>
        </div>
    </div>
</div>
<script src="js/jquery.min.js"></script> 
<script src="js/bootstrap.js"></script> 
</body>
</html>
<?php    
}
?>
<script>
$("#btnPrint").click(function(){
var sid="<?=$new_array['sid']?>";
var name="<?=$new_array['name']?>";
var mobile="<?=$new_array['mobile']?>";
var email="<?=$new_array['email']?>";
var img="<?=$file_name?>";
var college="<?=$new_array['college']?>";
//$("#ajax_loader").css("display","block");
$("#btnPrint").hide();
$.ajax({
	type: "POST",
	url: "http://sand-ip.com/SInfra/mail_send/send_email.php",
	data: {sid:sid,name:name,mobile:mobile,email:email,img:img,college:college},
				crossDomain: true,
				success: function(data){
				  if(data=="Y")
					alert("Gate pass is sent on your registered email id.");
					return false;
                                        //$("#ajax_loader").css("display","none");
				},
				error: function(data){
					alert("Error occcured");
                                       // $("#ajax_loader").css("display","none");
				}
});	
	
});
    </script>
    