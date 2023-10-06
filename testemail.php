<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['names'];
    $email = $_POST['emaile']; // Changed 'emails' to 'emaile'
    $message = $_POST['message']; // Changed 'messages' to 'message'

    $bodyphp = '
    <html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="x-apple-disable-message-reformatting">
        <title></title>
        <style>
            table, td, div, h1, p {font-family: Arial, sans-serif;}
        </style>
    </head>
    <body style="margin:0;padding:0;">
        <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;">
            <tr>
                <td align="center" style="padding:0;">
                    <table role="presentation" style="width:602px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;">
                        <tr>
                            <td align="center" style="padding:40px 0 30px 0;background:#b11919;">
                                <!-- <img src="" alt="" width="300" style="height:auto;display:block;" /> -->
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:36px 30px 42px 30px;">
                                <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                                    <tr>
                                        <td style="padding:0 0 36px 0;color:#153643;">
                                            <h1 style="font-size:24px;margin:0 0 20px 0;font-family:Arial,sans-serif;">
                                           E - Libing</h1>
                                            <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif; text-align: justify; text-justify: inter-word;">
                                                '.ucwords($name).'
                                                <br><br>Email submitted by: <a href="#">'.$email.'</a>.
                                                <br><br>Thank you and God Bless.
                                            </p>
                                            <!-- <p style="margin:0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;"><a href="#" style="color:#b11919;text-decoration:underline;">Proceed</a></p> -->
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:30px;background:#b11919;">
                                <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;font-size:9px;font-family:Arial,sans-serif;">
                                    <tr>
                                        <td style="padding:0;width:50%;" align="left">
                                            <p style="margin:0;font-size:14px;line-height:16px;font-family:Arial,sans-serif;color:#ffffff;">
                                                &reg; E - Libing<br/>
                                            </p>
                                        </td>
                                        <td style="padding:0;width:50%;" align="right">
                                            <table role="presentation" style="border-collapse:collapse;border:0;border-spacing:0;">
                                                <tr>
    
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
    </html>';

    try {
        $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->Host       = 'smtp-relay.sendinblue.com'; 
        $mail->SMTPAuth   = true;
        $mail->Username   = 'ryonuzuke@gmail.com'; 
        $mail->Password   = 'H7qjcmAVzkyhF3RJ'; 
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom($email, $name);
        $mail->addAddress('carlahuelar68@gmail.com', 'E - Libing');

        $mail->isHTML(true);
        $mail->Subject = 'E - Libing Request';
        $mail->Body    = $bodyphp;

        if ($mail->send()) {
            echo "<script type='text/javascript'>window.location = 'testemail.php'</script>";
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>

<form method="POST" action="testemail.php">
    <div class="fields">
        <div class="field half">
            <label for="name">Name</label>
            <input type="text" name="names" id="name" />
        </div>
        <div class="field half">
            <label for="email">Email</label>
            <input type="text" name="emaile" id="email" /> 
        </div>
        <div class="field">
            <label for="message">Message</label>
            <textarea name="message" id="messages" rows="5"></textarea> 
        </div>
    </div>
    <ul class="actions">
        <li><input type="submit" value="Send Message" class="button" /></li> 
</form>
