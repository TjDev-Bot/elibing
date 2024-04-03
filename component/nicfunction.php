<?php
function nextNumb($tmpInitial, $VarTable, $VarOrder, $VarLength, $DisYr)
{
    include "conn.php";

    if ($DisYr == '') {
        $DisYr = $tmpInitial . '';
    } else {
        $DisYr = $DisYr . $tmpInitial . '';
    }

    $query = "SELECT COALESCE((SELECT RIGHT(" . $VarOrder . ", 2) + 1 AS pernum FROM " . $VarTable . " AS x 
        WHERE LEFT(" . $VarOrder . ", LOCATE('', " . $VarOrder . ")) = '" . $DisYr . "' ORDER BY RIGHT(" . $VarOrder . ", 2) DESC LIMIT 1), 1) AS pernum";

    $stmt1 = $conn->prepare($query);
    $stmt1->execute(array());
    $stmt1->store_result();

    if ($stmt1->num_rows > 0) {
        $stmt1->bind_result($pernum);
        $stmt1->fetch();
        $NextIDnum = $pernum;
        $NextIDnum = $DisYr . str_pad($NextIDnum, 2, '0', STR_PAD_LEFT);
        return $NextIDnum;
    }

    $stmt1->closeCursor();
    $conn = null;
}
?>
