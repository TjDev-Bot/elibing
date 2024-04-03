<?php
include 'conn.php';

if (isset($_GET['nid'])) {
    $nid = $_GET['nid'];
    
    $selectmodal = "SELECT *
    FROM tblIntermentReservation
    INNER JOIN tblDeathRecord ON tblIntermentReservation.ProfID = tblDeathRecord.ProfileID
    LEFT JOIN tblNiche ON tblIntermentReservation.Nid = tblNiche.Nid
    LEFT JOIN tblBuriedRecord ON tblIntermentReservation.ProfID = tblBuriedRecord.Profid
    WHERE tblNiche.Nid = :nid AND tblBuriedRecord.Status = 0";
    
    $querymodal = $conn->prepare($selectmodal);
    $querymodal->bindParam(':nid', $nid, PDO::PARAM_STR);
    $querymodal->execute();
    
    $tableData = '';
    
    while ($data = $querymodal->fetch(PDO::FETCH_ASSOC)) {
        $name = $data['Fname'] . ' ' . $data['MName'] . ' ' . $data['Lname'];
        $birth = $data['Birthydate'];
        $dateofdeath = $data['DateofDeath'];
        $intermentdatetime = $data['IntermentDateTime'];
        
        $tableData .= '<tr>';
        $tableData .= '<td>' . $name . '</td>';
        $tableData .= '<td>' . date('F j, Y', strtotime($birth)) . '</td>';
        $tableData .= '<td>' . date('F j, Y', strtotime($dateofdeath)) . '</td>';
        $tableData .= '<td>' . date('F j, Y g:i A', strtotime($intermentdatetime)) . '</td>';
        $tableData .= '</tr>';
    }

    echo $tableData;
}
?>
