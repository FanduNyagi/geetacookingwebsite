<?php


require("class.phpmailer.php");


$mail = new PHPMailer;

$mail->IsSMTP();                                      // Set mailer to use SMTP
$mail->Host = "mail.geetacookingclass.in";                 // Specify main and backup server
//$mail->Host = "Give IP Address";                 // If the above does not work.
$mail->Port = 25;                                    // Set the SMTP port
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = "sales@geetacookingclass.in";                // SMTP username
$mail->Password = "cooking123";                  // SMTP password
//$mail->SMTPSecure = "ssl";                            // Enable encryption, 'ssl' also accepted

$mail->From = 'sales@geetacookingclass.in';
$mail->FromName = 'Geeta Cooking Classes';
$mail->AddAddress('nageshas@hotmail.com');  // Add a recipient
$mail->AddCC('nagesh.war@live.in');

$mail->IsHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <strong>in bold!</strong>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->Send()) {
	print_r($mail);
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}

echo 'Message has been sent';
exit(0);?>
