<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<meta content="utf-8" http-equiv="encoding">
<script src="../common/js/jquery.min.js"></script>
<script src="../common/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="../common/css/bootstrap.min.css">

<div id="welcomebox">
<div id="registerbox">
<h2>Register!</h2>
<b>Want to try Retwis? Create an account!</b>
<form id="frm_register" method="POST" onsubmit="return false">
<table>
    <tr>
        <td colspan="2"><small id="error_msg" style="color:red"></small></td>
    </tr>
<tr>
  <td>Username</td><td><input type="text" name="username" id="username">
  <small id="username_msg" style="color:red"></small>
  </td>
</tr>
<tr>
  <td>Password</td>
  <td><input type="password" name="password" id="password" >
    <small id="password_msg" style="color:red"></small>
  </td>
</tr>
<tr>
  <td>Password (again)</td>
  <td>
    <input type="password" name="password2" id="password2">
    <small id="password2_msg" style="color:red"></small>
  </td>
</tr>
<tr>
    <td colspan="2" style="padding-left: 128px"><img id="captcha" src="captcha.php" width="160" height="45" border="1" alt="CAPTCHA">
        <small>
            <a href="#" onclick=" document.getElementById('captcha').src = 'captcha.php?' + Math.random(); document.getElementById('captcha_code').value = ''; return false; ">refresh</a>
        </small>
    </td>         
</tr>
<tr>
    <td><input id="captcha_code" type="text" name="captcha" size="6" maxlength="5" onkeyup="this.value = this.value.replace(/[^\d]+/g, '');"> </td>
    <td>        
        <small id="captch_msg" style="color:red"></small>
    </td>
</tr>

        
<tr>
<td colspan="2" align="right"><input type="submit" name="doit" value="Create an account"></td></tr>
</table>
</form>
<h2>Already registered? Login here</h2>
<form id="frm_login" method="POST" onsubmit="return false;">
<table>
    <tr>
        <td colspan="2"><small id="login_error_msg" style="color:red"></small></td>
    </tr>
    <tr>
        <td>Username</td>
        <td>
            <input type="text" name="username_login" id="username_login">
            <small id="username_login_msg" style="color:red"></small>
        </td>
    </tr>
    <tr>
        <td>Password</td>
        <td>
            <input type="password" name="password_login" id="password_login">
            <small id="password_login_msg" style="color:red"></small>
        </td>
  </tr>
<tr>
    <td colspan="2" style="padding-left: 128px"><img id="captcha_login" src="captcha.php" width="160" height="45" border="1" alt="CAPTCHA">
        <small>
            <a href="#" onclick=" document.getElementById('captcha_login').src = 'captcha.php?' + Math.random(); document.getElementById('captcha_code').value = ''; return false; ">refresh</a>
        </small>
    </td>         
</tr>
<tr>
    <td><input id="captcha_code_login" type="text" name="captcha_login" size="6" maxlength="5" onkeyup="this.value = this.value.replace(/[^\d]+/g, '');"> </td>
    <td>        
        <small id="captch_login_msg" style="color:red"></small>
    </td>
</tr>
<tr>
  <td colspan="2" align="right"><input type="submit" name="doit2" value="Login"></td>
</tr>
</table>
</form>
</div>
Hello! Retwis is a very simple clone of <a href="http://twitter.com">Twitter</a>, as a demo for the <a href="http://code.google.com/p/redis/">Redis</a> key-value database. Key points:
<ul>
<li>Redis is a key-value DB, and it is <b>the only DB used</b> by this application, no MySQL or alike at all.</li>
<li>This application can scale horizontally since there is no point where the whole dataset is needed at the same point. With consistent hashing (not implemented in the demo to make it simpler) different keys can be stored in different servers.</li>
<li>The source code of this application, and a tutorial explaining its design, is available <a href="http://code.google.com/p/redis/wiki/TwitterAlikeExample">here</a>.
<li>PHP and the Redis server communicate using the PHP Redis library client written by Ludovico Mangocavallo and included inside the Redis tar.gz distribution.
</ul>
</div>
<script type="text/javascript" src="js/common.js"></script>
