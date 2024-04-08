<?php
session_start();
include('conn.php');

$email = $_GET['email'];
$password = $_GET['password'];

// date_default_timezone_set('Asia/Manila'); // Set the timezone to 'Asia/Manila'

$select = "SELECT * FROM tblUsersLogin WHERE username = ? AND pw = ?";
$stmt = $conn->prepare($select);
$stmt->bind_param('ss', $email, $password);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($row) {
    $role = $row['Restriction'];
    $_SESSION['id'] = $row['UserID'];
    $_SESSION['email1'] = $row['username'];
    $_SESSION['Createdby'] = $row['Createdby'];
    $_SESSION['restriction'] = $row['Restriction'];

    // Get the current time in the desired format (12-hour clock with AM or PM)
    // $currentDateTime = date('h:i:s A');

    $stmt1 = "INSERT INTO TBL_Audit_Trail (User_ID, Action) VALUES (?, 'Log-in')";
    $insertAudit = $conn->prepare($stmt1);
    $insertAudit->bind_param('i', $row['UserID']);
    $insertAudit->execute();

    // Get the current time in the desired format (12-hour clock with AM or PM)
    $currentDateTime = date('h:i:s A');

    $stmt1 = "INSERT INTO TBL_Audit_Trail (User_ID, Date, Timex, Action) VALUES (?, GETDATE(), ?, 'Log-in')";
    $insertAudit = $conn->prepare($stmt1);
    $insertAudit->bindParam(1, $result['UserID'], PDO::PARAM_STR);
    $insertAudit->bindParam(2, $currentDateTime, PDO::PARAM_STR); // Bind the formatted time

    $insertAudit->execute();

    if ($role == 'E-Libing Client') {
        header('location: ../client/dashboard.php');
        exit();
    } elseif ($role == 'E-Libing Admin') {
        header('location: ../admin/dashboard.php');
        exit();
    } elseif ($role == 'E-Libing Staff') {
        header('location: ../staff/deceased.php');
        exit();
    } elseif ($role == 'E-Libing ACAMP Site') {
        header('location: ../acamp/Intermentsched.php');
        exit();
    } else {
        die();
    }
} else {
    echo '<script type="text/javascript"> alert("Wrong Credentials\n Try Again"); window.location.href = "../user-log.php?email=' . urlencode($email) . '"; </script>';
    exit();
}
?>
