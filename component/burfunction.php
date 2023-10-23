<?php
function nextNumb($tmpInitial,$VarTable,$VarOrder,$VarLength,$DisYr)
{

include "conn.php"; 

	if ($DisYr =='')
    {
		$DisYr =$tmpInitial.'-';
	} else {
	$DisYr =$DisYr.$tmpInitial.'-';
	}
		
	$query= "select isnull((SELECT top 1 isnull(RIGHT(". $VarOrder .", 5)+ 1,1)  as pernum FROM ". $VarTable . "  AS x 
	WHERE left(". $VarOrder .", charindex('-',". $VarOrder .")) ='". $DisYr ."' order by isnull(RIGHT(". $VarOrder .", 5) ,1) desc) , 1) as pernum "; 
	
				 
	$stmt1 = $conn->prepare($query); 
	$stmt1->execute(array());
    while ($row = $stmt1->fetch()){
	$NextIDnum= $row['pernum'];  
	$NextIDnum=$DisYr.str_pad($NextIDnum ,5,'0',	STR_PAD_LEFT);  
	return $NextIDnum; 
    } 
	// mssql_free_result($stmt1);
	odbc_free_result($stmt1);
	mssql_close($conn);
}  

?>