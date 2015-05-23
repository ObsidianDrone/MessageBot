<?php

require 'assets/libs/PHPMailer/PHPMailerAutoload.php';

date_default_timezone_set('Etc/UTC');

$mail = new PHPMailer;

$mail->isSMTP();
$mail->SMTPDebug = 2;
$mail->Debugoutput = 'html';

$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';

$mail->SMTPAuth = true;
$mail->Username = "messagebot123@gmail.com";
$mail->Password = "mess1age2bot3";

$mail->setFrom('messagebot123@gmail.com', 'Message Bot');
$mail->addReplyTo('messagebot123@gmail.com', 'Message Bot');

$url = null;

if($_POST['type']==='text'){
    
    if($_POST['carrier']==='verizon'){
        $url = $_POST['phoneNumber'].'@vtext.com';
    }
    
    $mail->Subject = null;
    $mail->AltBody = $_POST['tBody'];
    
} elseif ($_POST['type']==='email'){
    
    $url = $_POST['email'];
    $mail->Subject = $_POST['subject'];
    $mail->AltBody = $_POST['eBody'];
    
}

$mail->addAddress($url);

for ($i=1; $i<=$_POST['amount']; $i++) {
    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Message sent!";
    }
}