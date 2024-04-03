<?php
    include 'conn.php';

    $total = $_POST['totalprice'];
    $profID = $_POST['profID'];
    $gatepassno = $_POST['gatepassno'];
    $name = $_POST['name'];
    $userID = $_POST['userid'];


    $insert = "INSERT INTO tblPayment (profileID, totalpayment, gatepassno) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($insert);
    $stmt->bind_param('iss', $profID, $total, $gatepassno);

    
    $stmt1 = "INSERT INTO TBL_Audit_Trail (User_ID, Action) VALUES (?, 'Accept payment: ". $name ."')";
    $insertAudit = $conn->prepare($stmt1);
    $insertAudit->bind_param('i', $userID);
    if($stmt->execute() && $insertAudit->execute()){
        echo "<script>alert('Payment added successfully'); window.location='../admin/gatepass.php?profid=".$profID."&gatepass=".$gatepassno."';</script>";
    }
?>