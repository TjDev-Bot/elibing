<?php

session_start();
include "conn.php";

date_default_timezone_set('Asia/Manila'); 
$currentDateTime = date('h:i:s A');

$profid = $_POST['profid'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$userID = $_POST['userid'];
$name = $_POST['fullname'];

try {
   
    $stmt1 = "INSERT INTO TBL_Audit_Trail (User_ID, Action) VALUES (?, 'Update Applicant Info: ". $name ."')";
    $insertAudit = $conn->prepare($stmt1);
    $insertAudit->bind_param('i', $userID);

    if ($insertAudit->execute()) {
        if (mysqli_affected_rows($conn) > 0) {
            $update = "UPDATE tblContactInfo SET ContactNo = ?, Email = ?, ModifiedWhen = CURDATE() WHERE ProfID = ?";
            $stmt = $conn->prepare($update);
            $stmt->execute([$contact, $email, $profid]);

            if (mysqli_affected_rows($conn) > 0) {
                echo "success";
            } else {
                echo "";
            }
        } else {
            echo "Error inserting into TBL_Audit_Trail.";
        }
    } else {
        echo "Error executing the audit insert query.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>