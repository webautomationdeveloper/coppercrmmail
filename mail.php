<?php
include('smtp/PHPMailerAutoload.php');

// echo '<pre>';
// print_r($_POST);
// echo '</pre>';



$html=$_POST['mailContent'];
smtp_mailer('waautomationdeveloper@gmail.com','subject test',$html);

if(isset($_POST['usrSubmit'])){ 
    $uploaddir = 'uploads/';
    $uploadfile = $uploaddir . basename($_FILES['attachment']['name']);
    $total = count($_FILES['attachment']['name']);
 

        if (move_uploaded_file($_FILES["attachment"]["tmp_name"], $uploadfile)) {
            echo "Thanks for Submitting your Quotation";
        }else {
            echo "Sorry, there was an error while submitting";
            }
}



function smtp_mailer($to,$subject, $msg){
	$mail = new PHPMailer(); 
	$mail->SMTPDebug  = 3;
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Username = "webautomationdeveloper@gmail.com";
	$mail->Password = "Test@2022";
	$mail->SetFrom("webautomationdeveloper@gmail.com");
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		echo $mail->ErrorInfo;
	}else{
		return 'Sent';
	}
}
?>