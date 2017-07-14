<?php
	
$mailTo=$_POST['mail_to'];
$mailFrom=$_POST['user_name'];
$mailSub=$_POST['mail_sub'];
$mailMsg=$_POST['mail_msg'];

require 'mailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->SMTPDebug = 0;                                  // Enable verbose debug output

$mail->isSMTP();                                       // Set mailer to use SMTP
$mail->Host = 'ssl://smtp.gmail.com';  					 // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                              // Enable SMTP authentication
$mail->Username = 'askrohinitravels@gmail.com';         // SMTP username
$mail->Password = 'moumita8788';                     // SMTP password
$mail->SMTPSecure = 'ssl';                        // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom($mailTo, $mailFrom);
$mail->addAddress('askrohinitravels@gmail.com', 'Ranadip');     // Add a recipient

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $mailSub;
$mail->Body    = $mailMsg;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    //echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
	header('Location: http://rohinionline.org/');
}