<?php
include('conn.php');

try {
    if (isset($_GET['id'])) {
        $profid = $_GET['id'];


        $intermentSql = "DELETE FROM tblIntermentReservation WHERE ProfID = ?";
        $intermentStmt = $conn->prepare($intermentSql);
        $intermentStmt->execute([$profid]);

        $deathSql = "DELETE FROM tblDeathRecord WHERE ProfileID = ?";
        $deathStmt = $conn->prepare($deathSql);
        $deathStmt->execute([$profid]);

        $contactSql = "DELETE FROM tblContactInfo WHERE ProfID = ?";
        $contactStmt = $conn->prepare($contactSql);
        $contactStmt->execute([$profid]);

        $conn->commit();

        header("Location: ../staff/form.php");
    } else {
        echo "Invalid request. Please provide a valid ID.";
    }
} catch (Exception $e) {
    $conn->rollback();
    echo "Error: " . $e->getMessage();
}

$conn = null; 
?>