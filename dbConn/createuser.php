<?php
include('conn.php');
require_once('../component/function.php');

date_default_timezone_set('Asia/Manila'); 
$currentDateTime = date('h:i:s A');
$name = $_POST['fullname'];
$email = $_POST['email'];
$password = $_POST['pw'];
$role = $_POST['role'];
$id = $_POST['id'];

// $profileID = nextnumb("PROF", "tblUsersLogin", "UserID", 7, 23);

if (!empty($name) || !empty($email) || !empty($password) || !empty($role)) {

    $select = "SELECT username FROM tblUsersLogin WHERE username = ? LIMIT 1";
    $insert = "INSERT INTO tblUsersLogin (Createdby, username, pw, Restriction, CreatedDate) VALUES (?, ?, ?, ?, CURDATE())";

    $stmt = $conn->prepare($select);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $num = $result->num_rows;
    $stmt->close();
    
    $stmt2 = "INSERT INTO TBL_Audit_Trail (User_ID, Action) VALUES (?, 'New Added User')";
    $insertAudit = $conn->prepare($stmt2);
    $insertAudit->bind_param('i', $id);
    $insertAudit->execute();

    if ($num == 0) {

        // $hashedPassword = hash('sha1', $password);

        // $passwordverify = password_verify($password, $hashedPassword);
        $stmt = $conn->prepare($insert);
        $stmt->bind_param('ssss', $name, $email, $password, $role);
        $stmt->execute();

        echo "<script>if(confirm('Your Record Successfully Inserted.')){document.location.href='../admin/user.php'};</script>";
    } else {
        
        echo '<script type="text/javascript"> alert("This Email: ' . $email . ' is already registered"); window.location.href = "../admin/user.php"; </script>';
    }
} else {
    echo "All fields are required";
    die();
}
?>