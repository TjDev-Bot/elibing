<?php
include '../dbConn/conn.php';

if (isset($_POST['startDate']) && isset($_POST['endDate'])) {
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];

    // Query to get totalDeath
    $selectTotalDeath = "SELECT COUNT(*) FROM tblBuriedRecord
        INNER JOIN tblIntermentReservation ON tblBuriedRecord.Profid = tblIntermentReservation.ProfID
        INNER JOIN tblDeathRecord ON tblBuriedRecord.Profid = tblDeathRecord.ProfileID
        WHERE tblBuriedRecord.OccupancyDate IS NOT NULL
        AND tblDeathRecord.IntermentDateTime >= '$startDate'
        AND tblDeathRecord.IntermentDateTime <= '$endDate'";

    // Query to get totalAvailable
    $selectTotalAvailable = "SELECT COUNT(*) FROM tblNiche
        INNER JOIN tblIntermentReservation ON tblNiche.Nid = tblIntermentReservation.Nid
        INNER JOIN tblDeathRecord ON tblIntermentReservation.ProfID = tblDeathRecord.ProfileID
        WHERE tblNiche.Status = 0
        AND tblDeathRecord.IntermentDateTime >= '$startDate'
        AND tblDeathRecord.IntermentDateTime <= '$endDate'";

    // Query to get totalReserve
    $selectTotalReserve = "SELECT COUNT(*) FROM tblNiche
        INNER JOIN tblIntermentReservation ON tblNiche.Nid = tblIntermentReservation.Nid
        INNER JOIN tblDeathRecord ON tblIntermentReservation.ProfID = tblDeathRecord.ProfileID
        WHERE tblNiche.Status = 1
        AND tblDeathRecord.IntermentDateTime >= '$startDate'
        AND tblDeathRecord.IntermentDateTime <= '$endDate'";

    $totalDeath = $conn->query($selectTotalDeath)->fetchColumn();
    $totalAvailable = $conn->query($selectTotalAvailable)->fetchColumn();
    $totalReserve = $conn->query($selectTotalReserve)->fetchColumn();

} else {
    $totalDeath = $totalAvailable = $totalReserve = 0;
}
$result = [
    'totalDeath' => $totalDeath,
    'totalAvailable' => $totalAvailable,
    'totalReserve' => $totalReserve,
];
echo json_encode($result);

?>