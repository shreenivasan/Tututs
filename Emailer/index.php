<?php

ini_set("display_errors", "on");
    
    function send_mail($to)
    {
        $email_subject='s';
        $email_body='s';
        require("class.phpmailer.php");
        $mailer = new PHPMailer();
        $mailer->SetLanguage("en", 'includes/phpMailer/language/');
        $mailer->IsSMTP();
        $mailer->Host = 'ssl://smtp.gmail.com:465';
        $mailer->SMTPAuth = TRUE;
//        $mailer->Username = 'shreenivas.madagundi@gmail.com';  // Change this to your gmail adress
//        $mailer->Password = '';  // Change this to your gmail password
//        $mailer->From = 'shreenivas.madagundi@carrottech.com';  // This HAVE TO be your gmail adress
        
        $mailer->Username = 'dummyd947@gmail.com'; // Change this to your gmail adress
        $mailer->Password = 'dummyd947@gmail'; // Change this to your gmail password
        $mailer->From = 'Dummy '; // This HAVE TO be your gmail adress
        $mailer->AddAttachment("http://dandiya.carrottech.in/images/sandip-logo.png");
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
    
send_mail("shreenivas.madagundi@gmail.com");