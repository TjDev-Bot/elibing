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
    $stmt1 = "INSERT INTO TBL_Audit_Trail (User_ID, Action) VALUES (?, 'Update Data')";
    $insertAudit = $conn->prepare($stmt1);
    $insertAudit->bind_param('i', $userID);

    if ($insertAudit->execute()) {
        $affectedRows = $insertAudit->affected_rows;

        if ($affectedRows > 0) {
            $update = "UPDATE tblUsersLogin SET username = ?, pw = ?, Restriction = ?, Createdby = ? WHERE UserID = ?";
            $stmt = $conn->prepare($update);
            $stmt->bind_param('ssssi', $email, $password, $role, $fullname, $userID);
            $stmt->execute();

            $affectedRowsUpdate = $stmt->affected_rows;

            if ($affectedRowsUpdate > 0) {
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
