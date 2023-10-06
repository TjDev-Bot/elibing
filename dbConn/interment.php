<?php
include('conn.php');

$role = $_POST['role'];
$user_id = $_POST['user_id'];
$user_name = $_POST['user_name'];
$relationship = $_POST['relationship'];
$barangay = $_POST['barangay'];
$purok = $_POST['purok'];
$deceased = $_POST['deceased'];
$age = $_POST['age'];
$deathdate = $_POST['deathdate'];
// $ddate = $_POST['ddate'];
// $time = $_POST['time'];

if (
    !empty($user_id) || !empty($user_name)  ||   !empty($role) ||!empty($relationship) || !empty($barangay) || !empty($purok) || !empty($deceased) || !empty($age) ||
    !empty($deathdate) 
) { 
    $sql = "INSERT INTO intermentform (user_id, user_name, role, relationship, barangay, purok, actions, deceased, age,  deathdate) VALUES (?, ?, ?, ?, ?, ?, '',? , ?, ? )";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "sssssssss",
        $user_id,
        $user_name,
        $role,
        $relationship,
        $barangay,
        $purok,
        $deceased,
        $age,
        $deathdate,
        // $ddate,
        // $time,
    );

    if ($stmt->execute()) {
        echo "<script>if(confirm('Your Appointment is Successfully Recorded')){document.location.href='../client/intermentschedule.php?name=$deceased';}</script>";
    } else {
        echo '<script type="text/javascript"> alert("An error occurred while processing the form. Please try again later."); window.location.href = "../client/index.php"; </script>';
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "All fields are required";
    die();
}
?>