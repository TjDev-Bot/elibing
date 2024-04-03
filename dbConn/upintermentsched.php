<?php
include "conn.php";
include "../component/burfunction.php";

// $burid = nextNumb("BUR", "tblBuriedRecord", "BurID", 7, 23);

$nicheno = $_POST['nid'];
$profid = $_POST['profid'];
$name = $_POST['name'];
$userID = $_POST['userid'];

try {

    $add1 = "INSERT INTO tblBuriedRecord (Profid, Nid, OccupancyDate, Status1) VALUES (?, ?, CURDATE(), 0)";
    $stmt = $conn->prepare($add1);
    $stmt->bind_param('is', $profid, $nicheno); 
    $stmt->execute();

    $stmt2 = "INSERT INTO TBL_Audit_Trail (User_ID, Action) VALUES (?, 'Buried: ". $name ."')";
    $insertAudit = $conn->prepare($stmt2);
    $insertAudit->bind_param('i', $userID);


    $update1 = "UPDATE tblNiche SET Status = 2 WHERE Nid = ?";
    $stmt1 = $conn->prepare($update1);
    $stmt1->execute([$nicheno]);
    
    $conn->commit();

    echo "success";
} catch (PDOException $e) {
    $conn->rollback();
    echo "Error: " . $e->getMessage();
}
?>