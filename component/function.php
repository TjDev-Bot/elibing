<?php
// Requires Initial 4 Characters
function nextNumb($tmpInitial, $VarTable, $VarOrder, $VarLength, $DisYr)
{
    include "conn.php";

    if ($DisYr == '') {
        $DisYr = $tmpInitial . '-';
    } else {
        $DisYr = $DisYr . $tmpInitial . '-';
    }

    $query = "SELECT COALESCE(MAX(CAST(SUBSTRING(" . $VarOrder . ", 1, LOCATE('-', " . $VarOrder . ") - 1) AS UNSIGNED)), 0) + 1 AS pernum 
              FROM " . $VarTable . " 
              WHERE LEFT(" . $VarOrder . ", LOCATE('-', " . $VarOrder . ") - 1) = ?";

    $stmt1 = $conn->prepare($query);
    $stmt1->bind_param('s', $DisYr);
    $stmt1->execute();
    $stmt1->bind_result($pernum);
    $stmt1->fetch();
    $stmt1->close();

    $NextIDnum = $DisYr . str_pad($pernum, 5, '0', STR_PAD_LEFT);

    return $NextIDnum;
}

// Example usage:
$tmpInitial = 'PROF';
$VarTable = 'tblUsersLogin';
$VarOrder = 'UserID';
$VarLength = 7;
$DisYr = '23';

$nextID = nextNumb($tmpInitial, $VarTable, $VarOrder, $VarLength, $DisYr);
echo $nextID;
?>
