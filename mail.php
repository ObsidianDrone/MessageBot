<?php

require 'assets/libs/sendgrid-php/sendgrid-php.php';

date_default_timezone_set('Etc/UTC');


//$start = microtime(true);
$sendgrid = new SendGrid('MessageBot', 'MessageBot123');
$mail = new SendGrid\Email();

$mail->setFrom('messagebot123@gmail.com');

$url = null;
$mail->setText = 'error';

if($_POST['type']==='text'){
    
    if($_POST['carrier']==='verizon'){
        $url = $_POST['phoneNumber'].'@vtext.com';
    } elseif($_POST['carrier']==='sprint'){
        $url = $_POST['phoneNumber'].'@messaging.sprintpcs.com';
    }
    
    $mail->setSubject = "MessageBot";
    $mail->setText = $_POST['tBody'];
    
} elseif ($_POST['type']==='email'){
    
    $url = $_POST['email'];
    $mail->setSubject = $_POST['subject'];
    $mail->setText = $_POST['eBody'];
    
}

$mail->addTo($url);

$amount = 1;

if ($_POST['amount']>3) {
    $amount=3;
} else {
    $amount = $_POST['amount'];
}

echo "<a href='/MessageBot'>Go Back</a><br/><hr/><br/>";
echo "DEBUG:<br/>";

for ($i=1; $i<=$amount; $i++) {
    try {
        $sendgrid->send($mail);
    } catch(\SendGrid\Exception $e) {
        echo $e->getCode();
        foreach($e->getErrors() as $er) {
            echo $er;
        }
    }
}