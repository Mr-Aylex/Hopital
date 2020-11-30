<?php

require('../vendor/autoload.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

/**
* Allowing to user to sign in with new password
*/
$addresse = $_POST['mail'];
require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/entity/user.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/manager/manager.php');
$manager = new manager();
$mail = new PHPMailer(true);
$a = $manager->if_mail_exist($addresse);
if ($a==true) {
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
        $mail->addAddress($addresse, '');     // Add a recipient
        //<a href="http://localhost/Hopital/forms/new_mdp.php">ici</a>
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Oublie de mot de passe';
        $mail->Body    = '<p>Clique <a href="http://localhost2/Hopital/forms/new_mdp.php?mail='.$addresse.'">ici</a> pour reinistailiser votre mot de passe</p>';
        $mail->AltBody = 'Hopital Robert Schuman';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
header('Location: ../index.php');

;

/*
$manager = new manager();
$manager->new_pass($user = null);
*/
?>
