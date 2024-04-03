Thomas Jon A. Barrientos
<?php
include "conn.php";

$selectedNno = $_POST['selectedNno'];
$selectedLocId = $_POST['selectedLocId'];
$selectedNid = $_POST['selectedNid'];
$appointmentID = $_POST['appointmentID'];
$profileID = $_POST['profileID'];
$nid = $_POST['nid'];
$updateQuery = "UPDATE tblIntermentReservation SET Nid = ? WHERE AppointmentID = ?";
$updateStatement = $conn->prepare($updateQuery);
$updateStatement->bind_param('si', $selectedNid, $appointmentID);
$updateStatement->execute();

$updateQuery2 = "UPDATE tblBuriedRecord SET Nid = ? WHERE ProfID = ?";
$updateStatement2 = $conn->prepare($updateQuery2);
$updateStatement2->bind_param('si', $selectedNid, $profileID);
$updateStatement2->execute();

$updateQuery3 = "UPDATE tblNiche SET Nid = ?, Status = 1 WHERE Nid = ?";
$updateStatement3 = $conn->prepare($updateQuery3);
$updateStatement3->bind_param('ss', $selectedNid, $selectedNid);
$updateStatement3->execute();

$updateQuery4 = "UPDATE tblNiche SET Status = 0 WHERE Nid = ?";
$updateStatement4 = $conn->prepare($updateQuery4);
$updateStatement4->bind_param('s', $nid);
$updateStatement4->execute();

$response = array('status' => 'success', 'message' => 'Records updated successfully!');
echo json_encode($response);
?>