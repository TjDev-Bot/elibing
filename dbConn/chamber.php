<?php
include('conn.php');

$lname = $_POST['lname'];
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$suffix = $_POST['suffix'];
$dateofdeath = $_POST['dateofdeath'];
$causeofdeath = $_POST['causeofdeath'];

if (
    !empty($lname) || !empty($fname)  ||   !empty($mname) || !empty($suffix) || !empty($dateofdeath) || !empty($causeofdeath)
) {
    $sql = "INSERT INTO chamber (lname, fname, mname, suffix, dateofdeath, causeofdeath ) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "ssssss",
        $lname,
        $fname,
        $mname,
        $suffix,
        $dateofdeath,
        $causeofdeath,
    );

    if ($stmt->execute()) {
        echo "<script>if(confirm('Your Appointment is Successfully Recorded')){document.location.href='../admin/chamber.php'};</script>";
    } else {
        echo '<script type="text/javascript"> alert("An error occurred while processing the form. Please try again later."); window.location.href = "../admin/cform.php"; </script>';
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "All fields are required";
    die();
}
