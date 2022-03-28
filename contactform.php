<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\htdocs\TalentBooth\PHPMailer-master\src\Exception.php';
require 'C:\xampp\htdocs\TalentBooth\PHPMailer-master\src\PHPMailer.php';
require 'C:\xampp\htdocs\TalentBooth\PHPMailer-master\src\SMTP.php';

$subject="Talentbooth Chat";
$name=$_REQUEST['name'];
$email=$_REQUEST['email'];
$message=$_REQUEST['message'];
//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

//Set the SMTP port number - 587 for authenticated TLS
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "alenyotriumph@gmail.com";

//Password to use for SMTP authentication
$mail->Password = "taiwan2000.";

//Set who the message is to be sent from
$mail->setFrom($email, $name);

//Set an alternative reply-to address
$mail->addReplyTo('Marie_Pincywa@Talentbooth.com', 'Marie Pincywa');

//Set who the message is to be sent to
$mail->addAddress("talentboothlimited@gmail.com", $name);

$mail->Subject = $subject;
$mail->Body = $message;
      if(!$mail->send()){
      echo "Mailer Error: " . $mail->ErrorInfo;
    }else{
        echo  "Message sent."  ;
       }
     
?>