<?php
include "conn.php";

$profid = $_POST['profid'];
$nicheno = $_POST['nicheno'];

try {

    $update1 = "UPDATE tblNiche SET Status = 1 WHERE Nid = ?";
    $stmt1 = $conn->prepare($update1);
    $stmt1->execute([$nicheno]);

    $update2 = "UPDATE tblIntermentReservation SET Nid = ? WHERE ProfID = ?";
    $stmt2 = $conn->prepare($update2);
    $stmt2->execute([$nicheno, $profid]);

    $conn->commit();

    echo "success";
} catch (PDOException $e) {
    $conn->rollback();
    echo "Error: " . $e->getMessage();
}
?>