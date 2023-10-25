<?php
include "conn.php";

$profid = $_POST['profid'];
$nicheno = $_POST['nicheno'];

try {
    // Start a transaction
    $conn->beginTransaction();

    // Prepare and execute the first update statement
    $update1 = "UPDATE tblNiche SET Status = 1 WHERE Nid = ?";
    $stmt1 = $conn->prepare($update1);
    $stmt1->execute([$nicheno]);

    // Prepare and execute the second update statement
    $update2 = "UPDATE tblIntermentReservation SET Nid = ? WHERE ProfID = ?";
    $stmt2 = $conn->prepare($update2);
    $stmt2->execute([$nicheno, $profid]);

    // Commit the transaction if both updates were successful
    $conn->commit();

    echo "success";
} catch (PDOException $e) {
    // Rollback the transaction in case of an error
    $conn->rollback();
    echo "Error: " . $e->getMessage();
}
?>