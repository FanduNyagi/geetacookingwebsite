<?php
require("class.phpmailer.php");

$sbj_visitor='Newsletter subscription confirmation email from ';
$sbj_owner='Newsletter subscription request from ';
$header="Content-type: text/html; charset=utf-8 \r\n";

$name=$_POST['name'];
$email=$_POST['email'];
$owner=$_POST['owner'];
$owner_email=$_POST['ownerEmail'];
$sitename=$_POST['sitename'];
$sbj_visitor.=$sitename;
$sbj_owner.=$sitename;
	
$msg_visitor='<a href="http://'.$sitename.'">'.$sitename.'</a>'."\n".'<br>'.'Hi, '.$name."\n".'<br>'.'Thank you for subscribing to our newsletter!';		
$msg_owner='<a href="http://'.$sitename.'">'.$sitename.'</a>'."\n".'<br>'.'This email has been sent via newsletter subscription form on your website. A new visitor would like to be added to your website\'s newsletter:'."\n".'<br>'.'Visitor name: '.$name."\n".'<br>'.'Visitor email: '.$email."\n".'<br>'.'Please add him (her) to your newsletter list.';
	
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

$mail->IsHTML(true);                                  // Set email format to HTML

$mail->AddAddress($email);
$mail->Subject = $sbj_visitor;
$mail->Body = $msg_visitor;
$mail->Send();


$mailOwner = new PHPMailer;
$mailOwner->IsSMTP();
$mailOwner->Host = "mail.geetacookingclass.in";

$mailOwner->Port = 25;
$mailOwner->SMTPAuth = true;
$mailOwner->Username = "sales@geetacookingclass.in";
$mailOwner->Password = "cooking123";
//$mailOwner->SMTPSecure = "ssl";

$mailOwner->From = 'sales@geetacookingclass.in';
$mailOwner->FromName = 'Geeta Cooking Classes';

$mailOwner->IsHTML(true);
$mailOwner->AddAddress($owner_email); 
$mailOwner->AddCC('sales@sanasofttech.com');
$mailOwner->Subject = $sbj_owner;
$mailOwner->Body = $msg_owner;
$mailOwner->Send();


?>