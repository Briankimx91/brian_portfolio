<?php
    require ('PHPMailer/class.phpmailer.php');
    require 'PHPMailer/PHPMailerAutoload.php';
    require_once 'email_config.default.php';
    $email = $_REQUEST['email'];
    $msg = $_REQUEST['message'];
    $name = $_REQUEST['name'];
    $tel = $_REQUEST['tel'];

    $mail = new PHPMailer();

    $mail->IsSMTP();                                      // set mailer to use SMTP
    $mail->Host = "smtp.gmail.com";  // specify main and backup server
    $mail->SMTPAuth = true;     // turn on SMTP authentication
    $mail->Username = EMAIL_USER;
    $mail->Password = EMAIL_PASS;
    $mail->Port = 465;
    $mail->SMTPSecure = 'tls';

    $mail->From = $email;
    $mail->FromName = $name;
    $mail->AddAddress("briankimx91@gmail.com", "Brian Kim");
    $mail->AddReplyTo($email, $name);


    $mail->WordWrap = 500;                                 // set word wrap to 50 characters
    $mail->IsHTML(true);                                  // set email format to HTML


    $mail->Subject = "From Portfolio, $name sent email";
    $mail->Body = "message:$msg and phone number:$tel";
    mail($name, $msg, $email, $tel);
    if(!$mail->send()) {
        echo 'Mailer error: ' . $mail->ErrorInfo;
    }
    echo 'Message has been sent.';
?>
