<?php
require __DIR__ . '/vendor/autoload.php';

use Semaphore\SemaphoreClient;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


                 
$pApiKey = "a6d46a0fdf128bf2c02d9ecc388754d0";

$contact = isset($_POST['contact']) ? $_POST['contact'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$email1 = isset($_POST['email1']) ? $_POST['email1'] : null;

if ($contact && $email) {
    $message = "Need to renew";
    $from = $email1;
    $smsSuccess = false;
    $emailSuccess = false;

    try {
       
        $ch = curl_init();
        $parameters = array(
            'apikey' => $pApiKey, 
            'number' => $contact,
            'message' => 'Need to Renew',
            'sendername' => 'SEMAPHORE'
        );
        curl_setopt( $ch, CURLOPT_URL,'https://semaphore.co/api/v4/messages' );
        curl_setopt( $ch, CURLOPT_POST, 1 );
        curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $parameters ) );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        $output = curl_exec( $ch );
        curl_close ($ch);
        // echo $output;
        $smsSuccess = true;


    } catch (Exception $e) {
        echo "An error occurred while sending the SMS: " . $e->getMessage();
        return; 
    }

    

    // Initialize the PHPMailer
    $mail = new PHPMailer(true);

    $bodyphp = ' <html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
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
                                                '.$message.'
                                                <br><br>Email submitted by: <a href="#">'.$from . '</a>.
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
        // Send the email
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'smtp-relay.sendinblue.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'capstoneproject95@gmail.com';
        $mail->Password = 'Nm6n492tfrzRhL3T';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom($from);
        $mail->addAddress($email, 'Test');
        $mail->isHTML(true);
        $mail->Subject = 'E - Libing Request';
        $mail->Body = $bodyphp;

        if ($mail->send()) {
            $emailSuccess = true;
        } else {
            echo "Email failed to send. Error: " . $mail->ErrorInfo;
            return; 
        }
    } catch (Exception $e) {
        echo "An error occurred while sending the email: "  . $e->getMessage();
        return; 
    }

    // Check if both SMS and email were successful
    if ($smsSuccess && $emailSuccess) {
        echo "success";
    } else {
        echo "SMS and email sending failed.";
    }
}
?>