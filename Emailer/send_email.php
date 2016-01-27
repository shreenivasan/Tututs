<?php
function send_mail($to,$data)
    {
        $email_subject='s';
        $email_body="<table>";
        $email_body.="<tr><td>Sid</td><td>".$data['sid']."</td</tr>";
        $email_body.="</table>";
        
        require("class.phpmailer.php");
        $mailer = new PHPMailer();
        $mailer->SetLanguage("en", 'includes/phpMailer/language/');
        $mailer->IsSMTP();
        $mailer->Host = 'ssl://smtp.gmail.com:465';
        $mailer->SMTPAuth = TRUE;
        $mailer->Username = 'dummyd947@gmail.com'; // Change this to your gmail adress
        $mailer->Password = 'dummyd947@gmail'; // Change this to your gmail password
        $mailer->From = 'Dummy '; // This HAVE TO be your gmail adress

        $mailer->FromName = 'Sandip foundation'; // This is the from name in the email, you can put anything you like here
        $mailer->Body = $email_body;
        $mailer->Subject =$email_subject;    
        $mailer->AddAddress($to);  // This is where you put the email adress of the person you want to mail
        
        if(!$mailer->Send())
        {
            echo "N";
        }
        else
        {
           echo "Y";
        }
    }
    
    $array=array("sid"=>$_REQUEST['sid'],"name"=>$_REQUEST['name'],"mobile"=>$_REQUEST['mobile']);
    
    send_mail($_REQUEST['email'],$array);
?>