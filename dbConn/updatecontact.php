<?php

session_start();
include "conn.php";

date_default_timezone_set('Asia/Manila'); 
$currentDateTime = date('h:i:s A');

$profid = $_POST['profid'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$userID = $_POST['userid'];
<<<<<<< HEAD
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
=======

try {
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> c9be5642966b076214c66ae87a16a96449635e9f
   
    $stmt1 = "INSERT INTO TBL_Audit_Trail (User_ID, Date, Timex, Action) VALUES (?, GETDATE(), ?, 'Update Data')";
    $insertAudit = $conn->prepare($stmt1);
    $insertAudit->bindParam(1, $userID, PDO::PARAM_STR);
    $insertAudit->bindParam(2, $currentDateTime, PDO::PARAM_STR);
<<<<<<< HEAD
=======
=======
    $update = "UPDATE tblContactInfo SET ContactNo = ?, Email = ?, ModifiedWhen = GETDATE() WHERE ProfID = ?";
    $stmt = $conn->prepare($update);
    $stmt->execute([$contact, $email, $profid]);
>>>>>>> b72c3c4ba43fb1f2e4ade966189cf6b3d95c1687
>>>>>>> c9be5642966b076214c66ae87a16a96449635e9f

    if ($insertAudit->execute()) {
        if ($insertAudit->rowCount() > 0) {
            $update = "UPDATE tblContactInfo SET ContactNo = ?, Email = ?, ModifiedWhen = GETDATE() WHERE ProfID = ?";
            $stmt = $conn->prepare($update);
            $stmt->execute([$contact, $email, $profid]);

            if ($stmt->rowCount() > 0) {
                echo "success";
            } else {
                echo "Error updating contact information.";
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
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
<<<<<<< HEAD
    echo "Error: " . $e->getMessage();
}
?>
=======
<<<<<<< HEAD
    echo "Error: " . $e->getMessage();
}
?>
=======
    echo " Error: " . $e->getMessage();
}
>>>>>>> b72c3c4ba43fb1f2e4ade966189cf6b3d95c1687
>>>>>>> c9be5642966b076214c66ae87a16a96449635e9f
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
