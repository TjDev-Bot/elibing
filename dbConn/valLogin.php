Thomas Jon A. Barrientos
<?php
session_start();
include('conn.php');

$email = $_GET['email'];
$password = $_GET['password'];

$select = "SELECT * FROM tblUsersLogin WHERE username = ? AND pw = ?";
$stmt = $conn->prepare($select);
$stmt->execute([$email, $password]);

$result = $stmt->fetch(PDO::FETCH_ASSOC);

if ($result) {
    $role = $result['Restriction'];

    $_SESSION['id'] = $result['UserID'];
    $_SESSION['Createdby'] = $result['Createdby'];
    $_SESSION['restriction'] = $result['Restriction'];

    if ($role == 'E-Libing Client') {
        header('location: ../client/index.php');
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
    echo '<script type="text/javascript"> alert("Wrong Credentials\n Try Again"); window.location.href = "../user-log.php"; </script>';
    exit();
}
?>