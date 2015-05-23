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
$mail->Body = 'error';

if($_POST['type']==='text'){
    
    if($_POST['carrier']==='verizon'){
        $url = $_POST['phoneNumber'].'@vtext.com';
    } elseif($_POST['carrier']==='sprint'){
        $url = $_POST['phoneNumber'].'@messaging.sprintpcs.com';
    }
    
    $mail->Subject = null;
    $mail->Body = $_POST['tBody'];
    
} elseif ($_POST['type']==='email'){
    
    $url = $_POST['email'];
    $mail->Subject = $_POST['subject'];
    $mail->Body = $_POST['eBody'];
    
}

$mail->addAddress($url);

$amount = 1;

if ($_POST['amount']>3) {
    $amount=3;
} else {
    $amount = $_POST['amount'];
}

echo '<a href="/MessageBot">Go Back</a><br/>'
echo 'DEBUG:<br/>';

for ($i=1; $i<=$amount; $i++) {
    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Message sent! <br/>";
    }
}