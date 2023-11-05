<?php
session_start();
include "conn.php";

date_default_timezone_set('Asia/Manila');
$currentDateTime = date('h:i:s A');

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$password = $_POST['pw'];
$role = $_POST['role']; 
$userID = $_POST['userid'];

try {
    $stmt1 = "INSERT INTO TBL_Audit_Trail (User_ID, Date, Timex, Action) VALUES (?, GETDATE(), ?, 'Update Data')";
    $insertAudit = $conn->prepare($stmt1);
    $insertAudit->bindParam(1, $userID, PDO::PARAM_STR);
    $insertAudit->bindParam(2, $currentDateTime, PDO::PARAM_STR);

    if ($insertAudit->execute()) {
        if ($insertAudit->rowCount() > 0) {
            $update = "UPDATE tblUsersLogin SET username = ?, pw = ?, Restriction = ?, Createdby = ? WHERE UserID = ?";
            $stmt = $conn->prepare($update);
            $stmt->execute([$email, $password, $role, $fullname, $userID]);

            if ($stmt->rowCount() > 0) {
                echo "success";
            } else {
                echo "Error updating user information.";
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