<?php 

$uploaddir = 'uploads/';
$uploadfile = $uploaddir . basename($_FILES['attachment']['name']);
move_uploaded_file($_FILES["attachment"]["tmp_name"], $uploadfile);

require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$content = $_POST['mailContent'];  /*$_POST['userQuote']*/
$mail= new PHPMailer();

$mail->isSMTP();
$mail->Host="smtp.gmail.com";
$mail->SMTPAuth="true";
$mail->SMTPSecure= "tls";
$mail->Port="587";
$mail->Username="webautomationdeveloper@gmail.com";
$mail->Password="Test@2022";
$mail->setFrom("webautomationdeveloper@gmail.com");
$mail->isHTML(true); 
$mail->Body= ''.$content.'';
$mail->AddAttachment($uploadfile);
$mail->addAddress("webautomationtester@gmail.com");

if( $mail->Send()){
    echo '<br> mail has been Sent';
}
else{
    echo '<br> mail not sent'; 
}
 $mail->smtpClose();

?>