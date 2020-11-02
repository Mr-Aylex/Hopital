<?php

require('../vendor/autoload.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

/**
* Allowing to user to sign in with new password
*/

session_start();

require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/entity/user.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/manager/manager.php');

$mail = new PHPMailer(true);
;
try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                 // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'hopitalrobertschuman@gmail.com';                     // SMTP username
    $mail->Password   = '?t5`3ST3"pQk+j2';                               // SMTP password
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    $mail->setLanguage('fr', '/optional/path/to/language/directory/');
    //Recipients
    $mail->setFrom('hopitalrobertschuman@gmail.com', 'Alexandre');
    $mail->addAddress($_POST['mail'], 'Joe User');     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Oublie de mot de passe';
    $mail->Body    = '<p>Cliqué <a href="">ici</a> pour réinistailiser votre mot de passe</p>';
    $mail->AltBody = 'Hopital Robert Schuman';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
/*
$manager = new manager();
$manager->new_pass($user = null);
*/
?>
