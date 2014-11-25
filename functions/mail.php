<?php
require("class.phpmailer.php");

$mail = new PHPMailer();

$mail->IsSMTP();                                      // set mailer to use SMTP
$mail->Host = "mail.websweeper.com";  // specify main and backup server
$mail->SMTPAuth = false;     // turn on SMTP authentication

$mail->From = $from;
$mail->FromName = $from_name;
$mail->AddAddress($recipient);                  // name is optional

$mail->WordWrap = 50;                                 // set word wrap to 50 characters
$mail->IsHTML(true);                                  // set email format to HTML

$mail->Subject = $subject;
$mail->Body    = $html_message;
$mail->AltBody = $text_message;

if(!$mail->Send())
{
   echo "Message could not be sent. <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}
?>