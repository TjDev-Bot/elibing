<?php
 
//  $server = '58.69.225.215'; $db = 'bis'; $user = 'nddu'; $password = 'ndducaps';
//  //$server = '192.168.1.57'; $db = 'bis'; $user = 'nddu'; $password = 'ndducaps';
 
// $dsn = 'sqlsrv:Server='.$server.';Database='.$db;

// try{
//     $conn = new PDO($dsn,$user,$password);
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } catch (Exception $ex){
//     echo 'not connected '.$ex->getMessage();
// 	echo "<br>";
//     echo('System is under maintenance. Please try again later.');
// }
 
// $dsn = 'sqlsrv:Server='.$server.';Database='.$db;
// try{
//     $conn = new PDO($dsn,$user,$password);
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } catch (Exception $ex){
//     echo 'not connected '.$ex->getMessage();
// 	echo "<br>";
//     echo('System is under maintenance. Please try again later.');
// } 

$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "elibing";

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
if (mysqli_connect_error()) {
    die('Connect Error(' . mysqli_connect_errno() . ')' . mysqli_connect_error());
}

?>

