<?php
function nextNumb($tmpInitial, $VarTable, $VarOrder, $VarLength, $DisYr)
{
    include "conn.php";

    if ($DisYr == '') {
        $DisYr = $tmpInitial . '';
    } else {
        $DisYr = $DisYr . $tmpInitial . '';
    }

    $query = "SELECT ISNULL(MAX(CAST(SUBSTRING(" . $VarOrder . ", " . (strlen($DisYr) + 1) . ", " . ($VarLength - strlen($DisYr)) . ") AS INT)), 0) + 1 AS pernum FROM " . $VarTable . " WHERE " . $VarOrder . " LIKE ?";
    $stmt1 = $conn->prepare($query);
    $stmt1->execute(array($DisYr . '%'));

    $row = $stmt1->fetch(PDO::FETCH_ASSOC);
    $NextIDnum = $row['pernum'];

    $NextIDnum = $DisYr . str_pad($NextIDnum, $VarLength - strlen($DisYr), '0', STR_PAD_LEFT);
    
    $stmt1->closeCursor();
    $conn = null;

    return $NextIDnum;
}
?>