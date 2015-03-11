<?php
require 'PHPMailerAutoload.php';
error_reporting(E_ALL);
ini_set('display_errors', '1');
$mail = new PHPMailer;


$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->Port = 587;
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'saurav.dikshit@esolzmail.com';                 // SMTP username
$mail->Password = 'souravesolz123';                           // SMTP password
$mail->SMTPSecure = 'tls';// Enable encryption, 'ssl' also accepted
$mail->SMTPDebug =1;
$mail->Priority =1;
$Mail->CharSet     = 'UTF-8';
$Mail->Encoding    = '8bit';


$mail->From = 'saurav.dikshit@esolzmail.com';
$mail->FromName = 'Test';
$mail->addAddress('milon.kanrar@esolzmail.com', 'Joe User');     // Add a recipient
$mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo('info@example.com', 'Information');
$mail->addCC('cc@example.com');
$mail->addBCC('bcc@example.com');


$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';



if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
    die();
} else {
    echo 'Message has been sent';
    die();
}
?>