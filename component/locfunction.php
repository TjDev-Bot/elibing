<?php
function nextNumb($tmpInitial, $VarTable, $VarOrder, $VarLength, $DisYr)
{
    include "conn.php";

    if ($DisYr == '') {
        $DisYr = $tmpInitial . '';
    } else {
        $DisYr = $DisYr . $tmpInitial . '';
    }

    $query = "SELECT ISNULL((SELECT TOP 1 ISNULL(RIGHT(" . $VarOrder . ", 3) + 1, 1) AS pernum FROM " . $VarTable . "  AS x 
        WHERE LEFT(" . $VarOrder . ", CHARINDEX('', " . $VarOrder . ")) = '" . $DisYr . "' ORDER BY ISNULL(RIGHT(" . $VarOrder . ", 3), 1) DESC), 1) AS pernum";

    $stmt1 = $conn->prepare($query);
    $stmt1->execute(array());

    while ($row = $stmt1->fetch()) {
        $NextIDnum = $row['pernum'];
        $NextIDnum = $DisYr . str_pad($NextIDnum, 5, '0', STR_PAD_LEFT);
        return $NextIDnum;
    }

    $stmt1->closeCursor();
    $conn = null;
}
?>
