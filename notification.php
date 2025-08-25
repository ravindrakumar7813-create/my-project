<?php
$headers = "From: demo@jaisanrelo.com";
$content = 'Contact Us';
require_once('mailer/class.phpmailer.php');
$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
//$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "mail.jaisanrelo.com.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->Username = "demo@jaisanrelo.com";
$mail->Password = "P@ssw0rd123";
$mail->SetFrom('demo@jaisanrelo.com', "Admin");
$mail->AddReplyTo("demo@jaisanrelo.com", "Admin"); 
$mail->AddAddress($_REQUEST['email'],"Admin");

$mail->Subject    = "Verify account now";
$mail->AltBody    = "Message here..."; // optional, comment out and test
$message = "Welcome to our website!\r\rYou, or someone using your email address, has completed registration at websjyoti.com. You can complete registration by clicking the following link:\rhttp://www.websjyoti.com/verify.php?activationkey=$activationkey\r\r\r\rRegards,\nWebs Jyoti Team";

$mail->MsgHTML($message);

if($mail->send() == true){
  echo 'Mail Sent';
}else{
  echo 'Error';
}






?>