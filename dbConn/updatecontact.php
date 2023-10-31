<?php

session_start();
include "conn.php";

date_default_timezone_set('Asia/Manila'); 
$currentDateTime = date('h:i:s A');

$profid = $_POST['profid'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$userID = $_POST['userid'];

try {
<<<<<<< HEAD
   
    $stmt1 = "INSERT INTO TBL_Audit_Trail (User_ID, Date, Timex, Action) VALUES (?, GETDATE(), ?, 'Update Data')";
    $insertAudit = $conn->prepare($stmt1);
    $insertAudit->bindParam(1, $userID, PDO::PARAM_STR);
    $insertAudit->bindParam(2, $currentDateTime, PDO::PARAM_STR);
=======
    $update = "UPDATE tblContactInfo SET ContactNo = ?, Email = ?, ModifiedWhen = GETDATE() WHERE ProfID = ?";
    $stmt = $conn->prepare($update);
    $stmt->execute([$contact, $email, $profid]);
>>>>>>> b72c3c4ba43fb1f2e4ade966189cf6b3d95c1687

    if ($insertAudit->execute()) {
        if ($insertAudit->rowCount() > 0) {
            $update = "UPDATE tblContactInfo SET ContactNo = ?, Email = ?, ModifiedWhen = GETDATE() WHERE ProfID = ?";
            $stmt = $conn->prepare($update);
            $stmt->execute([$contact, $email, $profid]);

            if ($stmt->rowCount() > 0) {
                echo "success";
            } else {
                echo "Error updating contact information.";
            }
        } else {
            echo "Error inserting into TBL_Audit_Trail.";
        }
    } else {
        echo "Error executing the audit insert query.";
    }
} catch (PDOException $e) {
<<<<<<< HEAD
    echo "Error: " . $e->getMessage();
}
?>
=======
    echo " Error: " . $e->getMessage();
}
>>>>>>> b72c3c4ba43fb1f2e4ade966189cf6b3d95c1687
