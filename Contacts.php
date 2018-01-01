<?php

require("class.phpmailer.php");

if(empty($_POST['name'])  || 
   empty($_POST['email']) || 
   empty($_POST['message']))
{
    $errors .= "\n Error: all fields are required";
}

$name = $_POST['name']; 
$email_address = $_POST['email']; 
$message = $_POST['message']; 

$mail = new PHPMailer;

$mail->IsSMTP();                                      // Set mailer to use SMTP
$mail->Host = "mail.geetacookingclass.in";                 // Specify main and backup server

$mail->Port = 25;                                    // Set the SMTP port
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = "sales@geetacookingclass.in";                // SMTP username
$mail->Password = "cooking123";                  // SMTP password
//$mail->SMTPSecure = "ssl";                            // Enable encryption, 'ssl' also accepted

$mail->From = 'sales@geetacookingclass.in';
$mail->FromName = 'Geeta Cooking Classes';

$mail->AddAddress('anilshankaruttarwar@yahoo.in');
$mail->AddBCC('nagesh.war@live.in');
$mail->AddReplyTo($email_address);

$mail->IsHTML(true);                                  // Set email format to HTML

$mail->Subject = "Enquiry from GeetaCookingClass.in website form : $name";
$mail->Body    = 'You have received a new message. Here are the details:'."\n".'<br>'."Name: $name "."\n".'<br>'."Email: $email_address"."\n".'<br>'."Message: $message"; 
$mail->AltBody = "You have received a new message. Here are the details:\n Name: $name \n Email: $email_address \n Message \n $message";

if(!$mail->Send()) 
{
	print_r($mail);
	echo 'Message could not be sent.';
	echo 'Mailer Error: ' . $mail->ErrorInfo;
	exit;
}

echo 'Message has been sent';


exit(0);?>
