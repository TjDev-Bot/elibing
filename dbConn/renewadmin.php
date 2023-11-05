<?php
include('conn.php');

$profid = $_POST['profid'];
<<<<<<< HEAD
$occupancyMonths = $_POST['occupancy'];

=======
<<<<<<< HEAD
$occupancyMonths = $_POST['occupancy'];

try {
    // Start a transaction
    $conn->beginTransaction();

    // Get the current date
    $currentDate = date('Y-m-d');

    // Calculate the new date by adding the selected months
    $newDate = date('Y-m-d', strtotime("$currentDate +$occupancyMonths months"));

    // Prepare and execute the update statement
    $update = "UPDATE tblBuriedRecord SET OccupancyDate = ? WHERE Profid = ?";
    $stmt = $conn->prepare($update);
    $stmt->execute([$newDate, $profid]);

    $conn->commit();

=======
$occupancy = $_POST['occupancy'];
>>>>>>> c9be5642966b076214c66ae87a16a96449635e9f
try {
    // Start a transaction
    $conn->beginTransaction();

    // Get the current date
    $currentDate = date('Y-m-d');

    // Calculate the new date by adding the selected months
    $newDate = date('Y-m-d', strtotime("$currentDate +$occupancyMonths months"));

    // Prepare and execute the update statement
    $update = "UPDATE tblBuriedRecord SET OccupancyDate = ? WHERE Profid = ?";
    $stmt = $conn->prepare($update);
    $stmt->execute([$newDate, $profid]);

    $conn->commit();

>>>>>>> b72c3c4ba43fb1f2e4ade966189cf6b3d95c1687
    echo "success";
} catch (PDOException $e) {
    // Rollback the transaction in case of an error
    $conn->rollback();
    echo "Error: " . $e->getMessage();
}
?>