<?php
include('conn.php');

$relationship = $_POST['relationship'];
$deceased = $_POST['deceased'];
$deathdate = $_POST['deathdate'];
$interment = $_POST['interment'];
//$transacdate = $_POST['transacdate'];
$month = $_POST['month'];

if (
    !empty($relationship) || !empty($deceased) || !empty($deathdate) || !empty($interment)
    || !empty($month)
) {
    $sql = "INSERT INTO renewal (relationship, deceased, deathdate, interment, month) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "sssss",
        $relationship,
        $deceased,
        $deathdate,
        $interment,
        //$transacdate,
        $month,
    );

    if ($stmt->execute()) {
        echo "<script>if(confirm('Your Appointment is Successfully Recorded')){document.location.href='../client/gatepass.php'};</script>";
    } else {
        echo '<script type="text/javascript"> alert("An error occurred while processing the form. Please try again later."); window.location.href = "#"; </script>';
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "All fields are required";
    die();
}
?>