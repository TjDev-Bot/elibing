<?php
include "conn.php";
include "../component/burfunction.php";

$burid = nextNumb("BUR", "tblBuriedRecord", "BurID", 7, 23);

$nicheno = $_POST['nid'];
$profid = $_POST['profid'];


try {
    $conn->beginTransaction();

    $add1 = "INSERT INTO tblBuriedRecord (BurID, ProfID, Nid, OccupancyDate, Status) VALUES (?, ?, ?, GETDATE(), '')";
    $stmt = $conn->prepare($add1);
    $stmt->bindParam(1, $burid, PDO::PARAM_STR);
    $stmt->bindParam(2, $profid, PDO::PARAM_STR);
    $stmt->bindParam(3, $nicheno, PDO::PARAM_STR);
    $stmt->execute();

    $update = "UPDATE tblDeathRecord SET IntermentDateTime = NULL WHERE ProfileID = ?";
    $stmt1 = $conn->prepare($update);
    $stmt1->execute([$profid]);
    
    $conn->commit();

    echo "success";
} catch (PDOException $e) {
    $conn->rollback();
    echo "Error: " . $e->getMessage();
}
?>