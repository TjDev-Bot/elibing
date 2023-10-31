<?php
session_start();
include('conn.php');

date_default_timezone_set('Asia/Manila'); 
$currentDateTime = date('h:i:s A');

if (isset($_SESSION["id"])) {
    $userID = $_SESSION["id"];
    
    $stmt1 = "INSERT INTO TBL_Audit_Trail (User_ID, Date, Timex, Action) VALUES (?, GETDATE(), ?, 'Log-out')";
    $insertAudit = $conn->prepare($stmt1);
    $insertAudit->bindParam(1, $userID, PDO::PARAM_STR);
    $insertAudit->bindParam(2, $currentDateTime, PDO::PARAM_STR);
    
    $insertAudit->execute();
}

// Destroy the session and redirect to the login page
session_destroy();
unset($_SESSION["id"]);
unset($_SESSION["lname"]);
unset($_SESSION["fname"]);
unset($_SESSION["mname"]);
header("Location: ../user-log.php");
?>
