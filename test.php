<?php
ob_start();
//comment added
$req="Y";
?>
<script src="js/jquery.min.js"></script>
<script>
function validateMe()
{
  var fl=$("#fileToUpload").val();	
		if(fl=="")
		{
			alert("Please select image");
			return false;
		}
		else
		{
					return true;
		}
   
}
</script>
<form action="post.php" id="frm" name="frm" method="post" enctype="multipart/form-data">
<table width="100%">
<tr>
<td width="30%">
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <div class="fb-page" data-href="https://www.facebook.com/SandipFoundationIndia" data-width="300" data-height="400" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/SandipFoundationIndia"><a href="https://www.facebook.com/SandipFoundationIndia">Sandip Foundation</a></blockquote></div></div>
</td>
<td width="70%">
        <?php
$q=$_REQUEST['q'];
$q=  base64_decode($q);
$q_array=  explode("&",$q);
//print_r($q_array);
$new_array=array();
for($i=0;$i<count($q_array);$i++)
{
    $temp=  explode("=",$q_array[$i]);
    $new_array[$temp[0]]=$temp[1];
}
?>
<table width="300px" height="200px" align="top" border="0">
    <tr>
        <td><img src="img/logo.png" height="100px"  width="100px" /></td>
        <td><b style="font-size: 20px">Dandiya Gate Pass</b></td>
    </tr>
    <tr>
        <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
        <td>Student Id</td>
        <td><?=$new_array['ID']?> <input type="hidden" value="<?=$new_array['ID']?>" name="sid"/>
        </td>        
    </tr>
    <tr>
        <td>Student Name:</td>
        <td><?=$new_array['Name']?>
            <input type="hidden" name="name" id="name" value="<?=$new_array['Name']?>" />
        </td>        
    </tr>
    <tr>
        <td>College</td>
        <td>
            <?=$new_array['College']?>
            <input type="hidden" name="college" id="college" value="<?=$new_array['College']?>" />
        </td>
    </tr>
   <tr>
        <td>Mobile No : </td>
        <td>
            <input type="text" name="mobile" id="mobile" value="<?=$new_array['Mobile']?>" />
        </td>
    </tr> 
    <tr>
        <td>Upload </td>
        <td><input type="file" name="fileToUpload" id="fileToUpload" maxlength="50" /></td>        
    </tr>
    <tr>
        <td colspan="2" style="padding-left: 100px;">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="2" style="padding-left: 100px;">
            <button align="center" type="submit" id="submit" style="border:1px solid black">Submit</button>
        </td> 
    </tr>
</table>
      
	</td>
	</tr>
	</table>
	</form>  