$(document).ready(function()
{    
    $("#login_frm").on('submit',function()
    {
       var uname =  $("#login_frm #username").val().trim();
       var pwd = $("#login_frm #password").val().trim();
       var email_exp=/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/
       $("#login_frm #msg_username").html("");
       $("#login_frm #msg_password").html("");
       console.log(uname.match(email_exp)==false);
       if(uname=="")
       {
           $("#login_frm #msg_username").html("*");            
           $("#login_frm #msg_username").focus();
       }
       else if(!uname.match(email_exp))
       {
           $("#login_frm #msg_username").html("*");            
           $("#login_frm #msg_username").focus();
       }
       if(pwd=="")
       {
           $("#login_frm #msg_password").html("*"); 
           $("#login_frm #msg_password").focus();
       }
       
        $.ajax
            ({
                url : 'ajax/validate_login.php',
                data:{"un":uname,"pwd":pwd},
                type: "POST",
                success: function(data)
                {
                    if(data=="IU")
                    {
                        $("#username_msg").html('Invalid username');
                    }
                    else if(data=="IP")
                    {
                        $("#password_msg").html('Invalid password');
                    }
                    else if(data=="IP2")
                    {
                        $("#password2_msg").html('Invalid confirm password');
                    }                    
                    else if(data=="IC")
                    {
                        $("#captch_msg").html('Invalid captcha code');
                    }
                    else if(data=="DU")
                    {
                        $("#error_msg").html('Username already taken');
                    }                    
                    else if(data=='Y')
                    {
                       window.location='home.php';
                    }
                    else
                    {
                        console.log(data)
                    }
                    
                },	
                error: function(data) 
                {
                    alert("error data===>"+data)
                }                
            });
      
    });
});


