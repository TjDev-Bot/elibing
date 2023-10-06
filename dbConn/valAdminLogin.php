<?php
session_start();
include('conn.php');

$email = $_GET['email'];
$password = $_GET['password'];

$select = "SELECT * FROM users WHERE email = ? AND password = ?";
$stmt = mysqli_prepare($conn, $select);
mysqli_stmt_bind_param($stmt, 'ss', $email, $password);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$num = mysqli_num_rows($result);
$role = mysqli_fetch_assoc($result);

if ($num == 1) {
    if ($role['role'] == 'admin') {
        $_SESSION['id'] = $role['id'];
        $_SESSION['lname'] = $role['lname'];
        $_SESSION['fname'] = $role['fname'];
        $_SESSION['midname'] = $role['midname'];

        header('location: ../admin/dashboard.php');
        exit();
    } else if ($role['role'] == 'staff') {
        $_SESSION['id'] = $role['id'];
        $_SESSION['lname'] = $role['lname'];
        $_SESSION['fname'] = $role['fname'];
        $_SESSION['midname'] = $role['midname'];

        header('location: ../staff/index.php');
        exit();
    } else {
        die();
    }
} else {
    echo '<script type="text/javascript"> alert("Wrong Credentials\n Try Again"); window.location.href = "../admin/index.php"; </script>';
    exit();
}

?>