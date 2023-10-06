<?php
include('conn.php');

$relationship = $_POST['relationship'];
$barangay = $_POST['barangay'];
$purok = $_POST['purok'];
$deceased = $_POST['deceased'];
$age = $_POST['age'];
$deathdate = $_POST['deathdate'];
$ddate = $_POST['ddate'];
$time = $_POST['time'];

if (
    !empty($relationship) || !empty($barangay) || !empty($purok) || !empty($deceased) || !empty($age) ||
    !empty($deathdate) || !empty($ddate) || !empty($time)
) {
    $sql = "INSERT INTO intermentform (relationship, barangay, purok, deceased, age, deathdate,desired_date,desired_time) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "ssssssss",
        $relationship,
        $barangay,
        $purok,
        $deceased,
        $age,
        $deathdate,
        $ddate,
        $time,
    );

    if ($stmt->execute()) {
        echo "<script>if(confirm('Your Appointment is Successfully Recorded')){document.location.href='../client/gatepass.php'};</script>";
    } else {
        echo '<script type="text/javascript"> alert("An error occurred while processing the form. Please try again later."); window.location.href = "../admin/appointment.php"; </script>';
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "All fields are required";
    die();
}
?>