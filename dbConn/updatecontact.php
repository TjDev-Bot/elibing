<?php
include "conn.php";

$profid = $_POST['profid'];
$relationship = $_POST['relationship'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$cause = $_POST['causeofdeath'];
$intermentplace = $_POST['intermentplace'];
$intermentdatetime = $_POST['intermentdate'];

try {
    $update = "UPDATE tblContactInfo SET ContactNo = ?, Email = ? WHERE ProfID = ?";
    $stmt = $conn->prepare($update);
    $stmt->execute([$contact, $email, $profid]);

    $updatedeath = "UPDATE tblDeathRecord SET Lname = ?, Fname = ?, MName = ?, IntermentPlace = ?, CauseofDeath = ? WHERE ProfileID = ?";
    $stmtdeath = $conn->prepare($updatedeath);
    $stmtdeath->execute([$lname, $fname, $mname, $intermentplace, $cause, $profid]);

    if ($stmt->rowCount() > 0 && $stmtdeath->rowCount() > 0) {
        echo "success";
    } else {
        echo "Error: Unable to update information";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}