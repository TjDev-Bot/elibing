<?php
require_once(__DIR__ . '/vendor/autoload.php');

use ClickSend\Configuration;
use ClickSend\Api\SMSApi;

$config = Configuration::getDefaultConfiguration()
    ->setUsername('b09489224270@gmail.com')
    ->setPassword('C286E996-F698-30A0-3F04-3B60CC27FC87');

$apiInstance = new SMSApi(new GuzzleHttp\Client(), $config);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $phoneNumber = $_POST['phone'];
    $message = $_POST['message'];

    $messageData = [
        'messages' => [
            [
                'source' => 'sdk',
                'from' => 'E-Libing', 
                'body' => $message,
                'to' => $phoneNumber,
            ],
        ],
    ];

    try {
        // Send the SMS
        $result = $apiInstance->smsSendPost($messageData);
        echo 'Message sent successfully!';
    } catch (Exception $e) {
        echo 'Exception when calling SMSApi->smsSendPost: ', $e->getMessage(), PHP_EOL;
    }
}
?>

<h2>Test SMS</h2>
<form action="" method="post">
    <label for="phone">Phone Number</label><br>
    <input type="text" name="phone" required>

    <br><br>
    <label for="message">Message</label><br>
    <input type="text" name="message">

    <input type="submit" value="Send">
</form>