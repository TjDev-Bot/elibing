<?php
include('conn.php');
require_once('../component/function.php');

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
// $profileID = nextnumb("PROF", "tblUsersLogin", "UserID", 7, 23);

if (!empty($name) || !empty($email) || !empty($password)) {

    $select = "SELECT username FROM tblUsersLogin WHERE username = ?";
    $insert = "INSERT INTO tblUsersLogin (Createdby, username, pw, Restriction) VALUES (?, ?, ?, 'E-Libing Client')";

    $stmt = $conn->prepare($select);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $num = $result->num_rows;

    if ($num == 0) {
        $stmt->close(); 

       
        $stmt = $conn->prepare($insert);
        $stmt->bind_param('sss', $name, $email, $password);
        $stmt->execute();

        echo "<script>if(confirm('Your Record Successfully Inserted. Now Login')){document.location.href='../user-log.php'};</script>";
    } else {
        echo '<script type="text/javascript"> alert("This Email: ' . $email . ' is already registered"); window.location.href = "../signin.php"; </script>';
    }
    $stmt->close();
    $conn->close(); // Close the database connection
} else {
    echo "All fields are required";
    die();
}
?>
