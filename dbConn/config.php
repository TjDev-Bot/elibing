<?php
 
 $server = '58.69.225.215'; $db = 'bis'; $user = 'NDDU'; $password = 'ndducaps';
//$server = '192.168.1.57'; $db = 'bis'; $user = 'nddu'; $password = 'ndducaps';
 
$dsn = 'sqlsrv:Server='.$server.';Database='.$db;

try{
    $con = new PDO($dsn,$user,$password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $ex){
    echo 'not connected '.$ex->getMessage();
	echo "<br>";
    echo('System is under maintenance. Please try again later.');
}
 
$dsn = 'sqlsrv:Server='.$server.';Database='.$db;
try{
    $con = new PDO($dsn,$user,$password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $ex){
    echo 'not connected '.$ex->getMessage();
	echo "<br>";
    echo('System is under maintenance. Please try again later.');
} 

?>