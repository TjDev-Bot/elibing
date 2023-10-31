<?php
include('conn.php');

try {
    if (isset($_GET['id'])) {
        $profid = $_GET['id'];

        // Begin the transaction
        $conn->beginTransaction();

        $intermentSql = "DELETE FROM tblIntermentReservation WHERE ProfID = ?";
        $intermentStmt = $conn->prepare($intermentSql);
        $intermentStmt->execute([$profid]);

        $deathSql = "DELETE FROM tblDeathRecord WHERE ProfileID = ?";
        $deathStmt = $conn->prepare($deathSql);
        $deathStmt->execute([$profid]);

        $contactSql = "DELETE FROM tblContactInfo WHERE ProfID = ?";
        $contactStmt = $conn->prepare($contactSql);
        $contactStmt->execute([$profid]);

        // Commit the transaction
        $conn->commit();

        header("Location: ../staff/form.php");
    } else {
        echo "Invalid request. Please provide a valid ID.";
    }
} catch (Exception $e) {
    // Rollback the transaction in case of an error
    $conn->rollback();
    echo "Error: " . $e->getMessage();
}

$conn = null; // Close the connection
?>