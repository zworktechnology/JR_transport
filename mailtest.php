<?php
require 'mail/PHPMailerAutoload.php';

$name = $_POST["full_name"];
$email = $_POST["email"];
$number = $_POST["phone"];
$message = $_POST["message"];



$mail = new PHPMailer;
$mail-> isSMTP();

// $mail->SMTPDebug = 4;                               // Enable verbose debug output

// $mail->SMTPOptions = array (
//     'ssl' => array(
//     'verify_peer' => false,
//     'verify_peer_name' => false,
//     'allow_self_signed' => true
//     )
//     );                                     // Set mailer to use SMTP

$mail->Host = ''; // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = '';                 // SMTP username
$mail->Password = '';                           // SMTP password
$mail->SMTPSecure = '';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom('mailer@gmail.com', 'bcc');
$mail->addAddress('mailer@gmail.com');     // Add a recipient
// $mail->addAddress('ellen@example.com');               // Name is optional
// $mail->addReplyTo('info@example.com', 'Information');
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML


$mail->Subject = 'mail from BCC website';
$mail->Body    = " Name: {$name}<br>
                   Number: {$number}<br>
                   Email: {$email}<br>
                   Message: {$message}<br>";
// $masil->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    // header("Refresh:1, url=index.php");
    header("Location:redirect.php");
    echo 'mail sent';
    exit();
}  
?>