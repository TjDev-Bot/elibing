<?php
include('conn.php');

$profid = $_POST['profid'];
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

    echo "success";
} catch (PDOException $e) {
    // Rollback the transaction in case of an error
    $conn->rollback();
    echo "Error: " . $e->getMessage();
}
?>