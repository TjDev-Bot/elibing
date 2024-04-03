<?php
include('conn.php');

$profid = $_POST['profid'];
$type = $_POST['type'];
$gatepassno = $_POST['gatepass'];
$userid = $_POST['userid'];
$req = $_POST['req'];
try {
    $currentDate = date('Y-m-d');

    // Adjust interval based on $type
    if ($type == 3) {
        $newDate = date('Y-m-d', strtotime("$currentDate -0 years"));
    } elseif ($type == 2) {
        $newDate = date('Y-m-d', strtotime("$currentDate -2 years"));
    }

    // Update the record
    $update = "UPDATE tblBuriedRecord SET OccupancyDate = ?, Status1 = ? WHERE Profid = ?";
    $stmt = $conn->prepare($update);
    $stmt->execute([$newDate, $type, $profid]);

    $insert = "INSERT INTO tblPayment (profileID, gatepassno, totalpayment) VALUES (?, ?,'1000.00')";
    $stmt = $conn->prepare($insert);
    $stmt->bind_param('is', $profid, $gatepassno);

    $stmt1 = "INSERT INTO TBL_Audit_Trail (User_ID, Action) VALUES (?, 'Renew: ".$req."')";
    $insertAudit = $conn->prepare($stmt1);
    $insertAudit->bind_param('i', $userid);
    $insertAudit->execute();
    // if($stmt->execute()){
    //     echo "<script>alert('Payment added successfully'); window.location='../admin/gatepass.php?profid=".$profID."&gatepass=".$gatepassno."';</script>";
    // }
    // $conn->commit();

    echo "success";
} catch (PDOException $e) {
    $conn->rollback();
    echo "Error: " . $e->getMessage();
    error_log("Error updating record: " . $e->getMessage(), 0);
}
?>