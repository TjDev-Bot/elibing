<?php
include('conn.php');
require_once('../component/function.php');

date_default_timezone_set('Asia/Manila'); 
$currentDateTime = date('h:i:s A');
$name = $_POST['fullname'];
$email = $_POST['email'];
$password = $_POST['pw'];
$role = $_POST['role'];
$profileID = nextnumb("PROF", "tblUsersLogin", "UserID", 7, 23);

if (!empty($name) || !empty($email) || !empty($password) || !empty($role)) {

    $select = "SELECT TOP 1 username FROM tblUsersLogin WHERE username = ?";
    $insert = "INSERT INTO tblUsersLogin (UserID, Createdby, username, pw, Restriction, CreatedDate) VALUES (?, ?, ?, ?, ?, GETDATE())";

    $stmt = $conn->prepare($select);
    $stmt->bindParam(1, $email, PDO::PARAM_STR);
    $stmt->execute();
    $num = $stmt->rowCount();

    
    $stmt2 = "INSERT INTO TBL_Audit_Trail (User_ID, Date, Timex, Action) VALUES (?, GETDATE(), ?, 'New Added User')";
    $insertAudit = $conn->prepare($stmt2);
    $insertAudit->bindParam(1, $userID, PDO::PARAM_STR);
    $insertAudit->bindParam(2, $currentDateTime, PDO::PARAM_STR);
    $insertAudit->execute();

    if ($num == 0) {
        $stmt->closeCursor(); // Close cursor before reusing $stmt

        // $hashedPassword = hash('sha1', $password);

        // $passwordverify = password_verify($password, $hashedPassword);
        $stmt = $conn->prepare($insert);
        $stmt->bindParam(1, $profileID, PDO::PARAM_STR);
        $stmt->bindParam(2, $name, PDO::PARAM_STR);
        $stmt->bindParam(3, $email, PDO::PARAM_STR);
        $stmt->bindParam(4, $password, PDO::PARAM_STR);
        $stmt->bindParam(5, $role, PDO::PARAM_STR);
        $stmt->execute();

        echo "<script>if(confirm('Your Record Successfully Inserted.')){document.location.href='../admin/user.php'};</script>";
    } else {
        
        echo '<script type="text/javascript"> alert("This Email: ' . $email . ' is already registered"); window.location.href = "../admin/user.php"; </script>';
    }
    $stmt->closeCursor();
    $conn = null; // Close the database connection
} else {
    echo "All fields are required";
    die();
}
?>