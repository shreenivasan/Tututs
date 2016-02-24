$("#frm_register").on("submit",function()
    {    
        var flag=true;
        var uname=$("#username").val();
        var pwd=$("#password").val();
        var pwd2=$("#password2").val();
        var cc=$("#captcha_code").val();
        
        if(uname.trim()=="") 
        {
            $("#username_msg").html('Please enter username');
            flag= false; 
        }
        if(pwd.trim()=="") 
        {
            $("#password_msg").html('Please enter password');
            flag= false; 
        }
        if(pwd2.trim()=="") 
        {
            $("#password2_msg").html('Please enter confirm password');
            flag= false; 
        }
        if(pwd2!=pwd) 
        {
            $("#password2_msg").html('Invalid confirm password is entered.');
            flag= false; 
        }
      if(cc.trim()=="") 
        {
            $("#captch_msg").html('Please enter captch values');
            flag= false; 
        }
        else
        {
            if(!cc.match(/^\d{5}$/)) 
            { 
                //alert('Please enter the CAPTCHA digits in the box provided'); 
                $("#captch_msg").html('Invalid captcha entered 1');
                $("#captcha_code").focus(); 
                flag= false; 
            }
        }
       
        if(flag==true)
        {   
            var uname=$("#username").val();
            var pwd=$("#password").val();
            var pwd2=$("#password2").val();
            var cc=$("#captcha_code").val();
            
            $("#username_msg").html('');
            $("#password_msg").html('');
            $("#password2_msg").html('');
            $("#captch_msg").html('');
            $("#error_msg").html('');
            
            $.ajax
            ({
                url : 'register.php',
                data:{"un":uname,"pwd":pwd,"pwd2":pwd2,"cc":cc},
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
        }
        else
        {
            return false;
        } 
    });	

$("#frm_login").on("submit",function()
{
    var flag=true;
    var uname=$("#username_login").val();
    var pwd=$("#password_login").val();
    var cc=$("#captcha_code_login").val();

    if(uname.trim()=="") 
    {
        $("#username_msg").html('Please enter username');
        flag= false; 
    }
    if(pwd.trim()=="") 
    {
        $("#password_msg").html('Please enter password');
        flag= false; 
    }

    if(cc.trim()=="") 
    {
        $("#captch_msg").html('Please enter captch values');
        flag= false; 
    }
    else
    {
        if(!cc.match(/^\d{5}$/)) 
        { 
            //alert('Please enter the CAPTCHA digits in the box provided'); 
            $("#captcha_login_msg").html('Invalid captcha entered');
            $("#captcha_code_login").focus(); 
            flag= false; 
        }
    }

    if(flag==true)
    {   
        $("#username_login_msg").html('');
        $("#password_login_msg").html('');           
        $("#captcha_login_msg").html('');
        $("#error_login_msg").html('');

        $.ajax
        ({
            url : 'login.php',
            data:{"un":uname,"pwd":pwd,"cc":cc},
            type: "POST",
            success: function(data)
            {
                if(data=="IU")
                {
                    $("#username_login_msg").html('Invalid username');
                }
                else if(data=="IP")
                {
                    $("#password_login_msg").html('Invalid password');
                }                                       
                else if(data=="IC")
                {
                    $("#captch_login_msg").html('Invalid captcha code');
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

    }


});