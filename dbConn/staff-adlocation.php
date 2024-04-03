<?php
include "conn.php";
require_once('../component/nicfunction.php');

date_default_timezone_set('Asia/Manila'); 
$currentDateTime = date('h:i:s A');


$locID = $_POST['locid'];
$nicheno = $_POST['nicheno'];
$level = $_POST['level'];
$stat = $_POST['stat'];
$size = $_POST['size'];
$profid = $_POST['profid'];
$userID = $_POST['userid'];

if (is_numeric($nicheno) || $nicheno > 0 || !empty($locID) || !empty($level) || !empty($stat) || !empty($size)) {
    $batchSize = 10;
    $numBatches = ceil($nicheno / $batchSize);
    $getMaxNnoSql = "SELECT MAX(Nno) FROM tblNiche";
    $getMaxNnoStmt = $conn->prepare($getMaxNnoSql);
    $getMaxNnoStmt->execute();
    $getMaxNnoStmt->bind_result($maxNno);
    $getMaxNnoStmt->fetch();
    
    if ($maxNno === null) {
        $maxNno = 0;
    }
    $getMaxNnoStmt->close();
    
    $counter = 1;

    $insertSql = "INSERT INTO tblNiche (Nid, LocID, Level, Size, Status, Nno) VALUES (?,?, ?, ?, 0, ?)";
    $stmt = $conn->prepare($insertSql);
    $stmt->bind_param('sssii', $nicherow, $locID, $level, $size, $nno);
 
    
    $stmt1 = "INSERT INTO TBL_Audit_Trail (User_ID, Action) VALUES (?, 'Add Niche')";
    $insertAudit = $conn->prepare($stmt1);
    $insertAudit->bind_param('i', $userID);
    $insertAudit->execute();

    for ($batch = 0; $batch < $numBatches; $batch++) {
        $batchStart = $batch * $batchSize;
        $batchEnd = min(($batch + 1) * $batchSize, $nicheno);

        for ($i = $batchStart; $i < $batchEnd; $i++) {
            $nicherow = nextNumb("N", "tblNiche", "Nid", 2, "");

            // Check if the generated Nid already exists
            $checkSql = "SELECT COUNT(*) AS count FROM tblNiche WHERE Nid = ?";
            $checkStmt = $conn->prepare($checkSql);
            $checkStmt->bind_param('s', $nicherow);
            $checkStmt->execute();
            $checkStmt->bind_result($count);
            $checkStmt->fetch();

            while ($count > 0) {
                echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    var modal = document.createElement('div');
                    modal.innerHTML = 'Nid:  $nicherow Added Successfully! ';
                    modal.style.position = 'fixed';
                    modal.style.top = '50%';
                    modal.style.left = '50%';
                    modal.style.transform = 'translate(-50%, -50%)';
                    modal.style.backgroundColor = 'white';
                    modal.style.padding = '30px';
                    modal.style.border = '1px solid #ccc';
                    modal.style.boxShadow = '0 2px 10px rgba(0, 0, 0, 0.2)';
                    modal.style.zIndex = '9999';
        
                    document.body.appendChild(modal);
        
                    setTimeout(function () {
                        modal.style.display = 'none';
                        window.location.href = '../staff/addniche.php?locid=". $locID . "';
                    }, 1000); 
                });
                </script>";

                $checkStmt->bind_param('s', $nicherow);
                $checkStmt->execute();
                $checkStmt->bind_result($count);
                $checkStmt->fetch();

            }

            $maxNno++;
            $nno = $maxNno;
            $checkStmt->close();


            if ($stmt->execute()) {
                echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    var modal = document.createElement('div');
                    modal.innerHTML = 'Niche Successfully Recorded';
                    modal.style.position = 'fixed';
                    modal.style.top = '50%';
                    modal.style.left = '50%';
                    modal.style.transform = 'translate(-50%, -50%)';
                    modal.style.backgroundColor = 'white';
                    modal.style.padding = '20px';
                    modal.style.border = '1px solid #ccc';
                    modal.style.boxShadow = '0 2px 10px rgba(0, 0, 0, 0.2)';
                    modal.style.zIndex = '9999';
        
                    document.body.appendChild(modal);
        
                    setTimeout(function () {
                        modal.style.display = 'none';
                        window.location.href = '../staff/addniche.php?locid=". $locID. "';
                    }, 1000); 
                });
                </script>";
            } else {
                echo "An error occurred while inserting a row with Nid: $nicherow.<br>";
            }

            $counter++; // Increment the counter
        }

        usleep(100000);
    }

    $stmt->close();
    

    echo "<script>
    setTimeout(function () {
        modal.style.display = 'none';
        window.location.href = '../staff/niche.php?locid=". $locID . "&profid=" . $profid . "';
    }, 1000); 
    </script>";
    
} else {
    echo "Invalid input. Please check the fields.";
    die();
}
?>