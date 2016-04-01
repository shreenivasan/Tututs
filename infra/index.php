<?php
    include_once 'common/header.php';
?>
<form id="login_frm" method="post" onsubmit="return false;" autocomplete="off">
    
    <div class="col-sm-12">
        <div class="col-sm-3"></div>
        <div class="col-sm-6 text-center">Login</div>
        <div class="col-sm-3"></div>
    </div>
    <div class="col-sm-12 text-center">
        <span id="error_msg" style="color:red"></span>
    </div>
    <div class="col-sm-12">
        <div class="col-sm-2"></div>
        <div class="col-sm-4 text-center">Username</div>
        <div class="col-sm-4 text-center"><input type="text" autocomplete="off" id="username" name="username" placeholder="Username ..." maxlength="50" />
            <span id="msg_username" style="color:red"></span>
        </div>
        <div class="col-sm-2"></div>
    </div>
    <div class="col-sm-12">
        <div class="col-sm-2"></div>
        <div class="col-sm-4 text-center">Password</div>
        <div class="col-sm-4 text-center">
            <input type="password" autocomplete="off" id="password" name="password" placeholder="Password ..." maxlength="50" />
            <span id="msg_password" style="color:red"></span>
        </div>
        <div class="col-sm-2"></div>
    </div>
    <div class="col-sm-12">
        <div class="col-sm-4"></div>
        <div class="col-sm-4 text-center"><button class="btn-primary" id="btn_login" name="btn_login">Login</button></div>
        <div class="col-sm-4"></div>
    </div>
</form>
<?php
    include_once 'common/footer.php';
?>