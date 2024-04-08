<?php
include('conn.php');

$profid = $_POST['profid'];
<<<<<<< HEAD
$type = $_POST['type'];
$gatepassno = $_POST['gatepass'];
$userid = $_POST['userid'];
$req = $_POST['req'];
=======
<<<<<<< HEAD
$occupancyMonths = $_POST['occupancy'];

=======
<<<<<<< HEAD
$occupancyMonths = $_POST['occupancy'];

>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
try {
    $currentDate = date('Y-m-d');

<<<<<<< HEAD
    // Adjust interval based on $type
    if ($type == 3) {
        $newDate = date('Y-m-d', strtotime("$currentDate -0 years"));
    } elseif ($type == 2) {
        $newDate = date('Y-m-d', strtotime("$currentDate -2 years"));
    }
=======
    // Get the current date
    $currentDate = date('Y-m-d');

    // Calculate the new date by adding the selected months
    $newDate = date('Y-m-d', strtotime("$currentDate +$occupancyMonths months"));

    // Prepare and execute the update statement
    $update = "UPDATE tblBuriedRecord SET OccupancyDate = ? WHERE Profid = ?";
    $stmt = $conn->prepare($update);
    $stmt->execute([$newDate, $profid]);
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed

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

=======
$occupancy = $_POST['occupancy'];
>>>>>>> c9be5642966b076214c66ae87a16a96449635e9f
try {
    // Start a transaction
    $conn->beginTransaction();

    // Get the current date
    $currentDate = date('Y-m-d');

    // Calculate the new date by adding the selected months
    $newDate = date('Y-m-d', strtotime("$currentDate +$occupancyMonths months"));

    // Prepare and execute the update statement
    $update = "UPDATE tblBuriedRecord SET OccupancyDate = ? WHERE Profid = ?";
    $stmt = $conn->prepare($update);
    $stmt->execute([$newDate, $profid]);

    $conn->commit();

>>>>>>> b72c3c4ba43fb1f2e4ade966189cf6b3d95c1687
    echo "success";
} catch (PDOException $e) {
    $conn->rollback();
    echo "Error: " . $e->getMessage();
    error_log("Error updating record: " . $e->getMessage(), 0);
}
?>