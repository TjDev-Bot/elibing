<?php
include('conn.php');

$profid = $_POST['profid'];
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
try {
    // Start a transaction
    $conn->beginTransaction();

    // Prepare and execute the first update statement
    $update1 = "UPDATE tblBuriedRecord SET OccupancyDate = ? WHERE Profid = ?";
    $stmt1 = $conn->prepare($update1);
    $stmt1->execute([$occupancy, $profid]);
    // // Prepare and execute the second update statement
    // $update2 = "UPDATE tblIntermentReservation SET Nid = ? WHERE ProfID = ?";
    // $stmt2 = $conn->prepare($update2);
    // $stmt2->execute([$nicheno, $profid]);

    $conn->commit();

>>>>>>> b72c3c4ba43fb1f2e4ade966189cf6b3d95c1687
    echo "success";
} catch (PDOException $e) {
    // Rollback the transaction in case of an error
    $conn->rollback();
    echo "Error: " . $e->getMessage();
}
?>