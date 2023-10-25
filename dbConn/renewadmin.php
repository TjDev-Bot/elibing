<?php
include('conn.php');

$profid = $_POST['profid'];
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

    echo "success";
} catch (PDOException $e) {
    // Rollback the transaction in case of an error
    $conn->rollback();
    echo "Error: " . $e->getMessage();
}
?>