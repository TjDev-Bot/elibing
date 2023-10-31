<?php
include 'conn.php';

$profidd = $_POST['id'];
$nid = $_POST['nid'];
date_default_timezone_set('Asia/Manila');
$currentDateTime = date('h:i:s A');

try {
    $sql = "UPDATE tblNiche SET Status = 2 WHERE Nid = :nid";
    $stmt = $conn->prepare($sql);
    
    $stmt->bindParam(':nid', $nid, PDO::PARAM_INT);
    
    if ($stmt->execute()) {
        echo '<script>alert("Update successful"); window.location = "../admin/gatepass.php?profid=' . $profidd . '";</script>';
    } else {
        echo '<script>alert("Update failed"); window.location = "../admin/gatepass.php?profid=' . $profidd . '";</script>';
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
