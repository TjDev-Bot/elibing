<?php
include('conn.php');
require_once('../component/function.php');

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$profileID = nextnumb("PROF", "tblUsersLogin","UserID",7,23);

if (!empty($name) || !empty($email) || !empty($password)) {

    $select = "SELECT TOP 1 username FROM tblUsersLogin WHERE username = ?";
    $insert = "INSERT INTO tblUsersLogin (UserID, Createdby, username, pw, Restriction) VALUES (?, ?, ?, ?, 'Client')";

    $stmt = $conn->prepare($select);
    $stmt->bindParam(1, $email, PDO::PARAM_STR);
    $stmt->execute();
    $num = $stmt->rowCount();

    if ($num == 0) {
        $stmt->closeCursor(); // Close cursor before reusing $stmt
        $stmt = $conn->prepare($insert);
        $stmt->bindParam(1, $profileID, PDO::PARAM_STR);
        $stmt->bindParam(2, $name, PDO::PARAM_STR);
        $stmt->bindParam(3, $email, PDO::PARAM_STR);
        $stmt->bindParam(4, $password, PDO::PARAM_STR);
        $stmt->execute();

        echo "<script>if(confirm('Your Record Successfully Inserted. Now Login')){document.location.href='../user-log.php'};</script>";
    } else {
        echo '<script type="text/javascript"> alert("This Email: ' . $email . ' is already registered"); window.location.href = "../signin.php"; </script>';
    }
    $stmt->closeCursor();
    $conn = null; // Close the database connection
} else {
    echo "All fields are required";
    die();
}
?>
