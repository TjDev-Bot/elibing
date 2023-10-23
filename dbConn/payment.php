<?php
include "conn.php";
$nid = $_POST['nid'];
$profid = $_POST['id'];

try {
    $update1 = "UPDATE tblNiche SET Status = 2 WHERE Nid = ?";
    $stmt1 = $conn->prepare($update1);
    $stmt1->execute([$nid]);

    $update2 = "UPDATE tblIntermentReservation SET Nid = ? WHERE ProfID = ?";
    $stmt2 = $conn->prepare($update2);
    $stmt2->execute([$nid, $profid]);

    // Check if the update was successful
    if ($stmt1->rowCount() > 0) {
        // Redirect to index.php
        header("Location: index.php");
        exit();
    } else {
        echo "No records updated.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>