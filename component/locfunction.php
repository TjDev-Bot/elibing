<?php
function nextNumb($tmpInitial, $VarTable, $VarOrder, $VarLength, $DisYr)
{
    include "conn.php";

    $prefix = ($DisYr == '') ? $tmpInitial : $DisYr . $tmpInitial;

    $query = "SELECT IFNULL(MAX(CAST(SUBSTRING(" . $VarOrder . ", " . (strlen($prefix) + 1) . ", " . ($VarLength - strlen($prefix)) . ") AS SIGNED)), 0) + 1 AS pernum FROM " . $VarTable . " WHERE " . $VarOrder . " LIKE ?";
    $stmt1 = $conn->prepare($query);

    $param = $prefix . '%';
    $stmt1->bind_param('s', $param); 
    $stmt1->execute();

    $result = $stmt1->get_result();
    $row = $result->fetch_assoc();
    $NextIDnum = $row['pernum'];

    $NextIDnum = $prefix . str_pad($NextIDnum, $VarLength - strlen($prefix), '0', STR_PAD_LEFT);

    $stmt1->close();
    $conn->close();

    return $NextIDnum;
}
?>
