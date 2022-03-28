<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\htdocs\TalentBooth\PHPMailer-master\src\Exception.php';
require 'C:\xampp\htdocs\TalentBooth\PHPMailer-master\src\PHPMailer.php';
require 'C:\xampp\htdocs\TalentBooth\PHPMailer-master\src\SMTP.php';
#this is to make the code show you all the possible errors,even the ones that would be serverside
error_reporting(E_ALL);
ini_set('display_errors', 1);


#this loop envelops all the code so that,it makes everything controlled by the submit button
if(isset($_POST['save']))
{

$servername="localhost";#name of the server
$username="root";#default name of user
$password="";#dont mind about it,unless you had set one
$database_name="talentbooth";

#this is the line that connects the php code to the mysql database
$conn=mysqli_connect($servername,$username,$password,$database_name);

#to check connection,and again cover the rest of the code only to continue if the connection is okay
if(!$conn)
{
    echo "sorry";
    die("Connection Failed:" . mysqli_connect_error());
}

       #here,the variables to be used in the sql querry are assigned and methods

       #this is from the form
       $FirstName = $_POST["FirstName"];
       $OtherName = $_POST["OtherName"];
       $Email = $_POST["Email"];
       $PhoneNumber = $_POST["PhoneNumber"];
       $Gender = $_POST["Gender"];
       $Job = $_POST["Job"];
       $Area = $_POST["Area"];
       
       #this is for the files or images to be uploaded
       $file = $_FILES['File']['name'];
       $pname = rand(1000,10000)."-".$file;
       $tname = $_FILES['File']['tmp_name'];

       #this allows us to store all the uploaded files in a folder
       $uploads='C:\xampp\htdocs\uploads';
       move_uploaded_file($tname,addslashes($uploads.''.$pname));

       #this is the actual query
       $sql=("insert into submitted(FirstName,OtherName,Email,AREA_CODE,PhoneNumber,Gender,ROLE_APPLIED,Uploads,DATE_APPLIED)values('$FirstName','$OtherName','$Email','$Area','$PhoneNumber','$Gender','$Job','$pname',now())");
       
       #this does the final check of the connection,before applying this to the database
       echo "<pre>Debug: $sql</pre>\m";
       $result = mysqli_query($conn, $sql);

       if ( false===$result ) {
         echo (mysqli_connect_error($conn));
       }
       else {
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
$mail->setFrom('Marie_Pinycwa@Talentbooth.com', 'Marie Pincywa');

//Set an alternative reply-to address
$mail->addReplyTo('talentboothlimited@gmail.com', 'Marie Pincywa');

//Set who the message is to be sent to
$mail->addAddress($Email,  $FirstName);

$message="Dear $FirstName,
Thank you for your application to the position of $Job.

We confirm receipt of your application and the process is underway and greatly appreciate your time,trust ,interest and choosing our services.
We hope that  you continue to look for other roles that may be a fit for you.
      
Best regards,
      
Talent Booth Team.";
      
$subject="Application Response";
$mail->Subject = $subject;
$mail->Body = $message;
      if(!$mail->send()){
      echo "Mailer Error: " . $mail->ErrorInfo;
    }else{
        echo "Message sent!";

       }
      }

    }
      
      


?>

