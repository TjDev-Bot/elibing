<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp-relay.sendinblue.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'capstoneproject95@gmail.com';
        $mail->Password = 'Nm6n492tfrzRhL3T';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress('carlahuelar68@gmail.com', 'Carla Huelar');

        $mail->isHTML(true);
        $mail->Subject = 'Contact Form Submission';
        $mail->Body = "Name: $name<br>Email: $email<br>Message: $message";

        $mail->send();

        echo "<script>
                 alert('Message sent successfully!');
                 window.location.href='contact.php';
              </script>";
    } catch (Exception $e) {
        echo "<script>
                 alert('Error: {$mail->ErrorInfo}');
                 window.history.back();
              </script>";
    }
}
?>
