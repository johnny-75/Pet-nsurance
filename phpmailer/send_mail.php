<?php
require 'PHPMailerAutoload.php';

$task=$_GET['task'];
if($task=="forgot")
{
    $to_mail=$_GET['email'];
    $hash=$_GET['hash'];
    $message="<b style='font-size:25px; font-weight:bold'>Pet Insurance</b><br/>We have received your request for changing your <strong>password</strong>.<br/> <b>Click</b> the bellow link to change your password<br/><br/>http://localhost/insurance/change_password.php?request_mail=$to_mail&hash=$hash";
}

if($task=="enquiry")
{
    $to_mail="johnson581314@gmail.com";
    $name=$_GET['name'];
    $email=$_GET['email'];
    $phone=$_GET['phone'];
    $user_message=$_GET['message'];
    $message="<b>Mr.$name </b>trying to contact us with the bellow message<br/><br/>User Information: <br/>Name:<b>$name</b><br/>email: $email<br/>Phone: <b>$phone</b><br/>Message: $user_message";

}

//require 'credential.php';
$ini = parse_ini_file("../config.ini");
$mail = new PHPMailer;

$uname=$ini['EMAIL'];
$pass=$ini['PASSWORD'];

//$mail->SMTPDebug = 2;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = $uname;                 // SMTP username
$mail->Password = $pass;                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('no-replay@petinsurance.com', 'Email tutorial');
$mail->addAddress($to_mail);     // Add a recipient             // Name is optional
$mail->addReplyTo($uname);

// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML



if($task=="forgot")
{
    $mail->Subject = 'Change Password';
}
if($task=="enquiry")
{
    $mail->Subject = "Received an user enquiry";
}

$mail->Body    = $message;
$mail->AltBody = '';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
?>