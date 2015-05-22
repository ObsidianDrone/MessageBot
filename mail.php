<?php

echo "test";

var_dump($_POST);

/*date_default_timezone_set('Etc/UTC');

require '../PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();
$mail->SMTPDebug = 2;
$mail->Debugoutput = 'html';

$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';

$mail->SMTPAuth = true;
$mail->Username = "username@gmail.com";
$mail->Password = "yourpassword";

$mail->setFrom('from@example.com', 'First Last');
$mail->addReplyTo('replyto@example.com', 'First Last');

$mail->addAddress('whoto@example.com', 'John Doe');

$mail->Subject = 'PHPMailer GMail SMTP test';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));

//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';

//Attach an image file
$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}/*