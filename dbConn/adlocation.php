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
<<<<<<< HEAD
$userID = $_POST['userid'];

if (is_numeric($nicheno) || $nicheno > 0 || !empty($locID) || !empty($level) || !empty($stat) || !empty($size)) {
    $batchSize = 10;
    $numBatches = ceil($nicheno / $batchSize);
=======
<<<<<<< HEAD
$userID = $_POST['userid'];

if (is_numeric($nicheno) || $nicheno > 0 || !empty($locID) || !empty($level) || !empty($stat) || !empty($size)) {
    $batchSize = 10;
    $numBatches = ceil($nicheno / $batchSize);
=======
<<<<<<< HEAD
$userID = $_POST['userid'];

=======

// Check if the input values are valid
>>>>>>> b72c3c4ba43fb1f2e4ade966189cf6b3d95c1687
if (is_numeric($nicheno) || $nicheno > 0 || !empty($locID) || !empty($level) || !empty($stat) || !empty($size)) {
    $batchSize = 10;
    $numBatches = ceil($nicheno / $batchSize);

<<<<<<< HEAD
=======
    // Get the maximum Nno for the given LocID
>>>>>>> b72c3c4ba43fb1f2e4ade966189cf6b3d95c1687
>>>>>>> c9be5642966b076214c66ae87a16a96449635e9f
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
    $getMaxNnoSql = "SELECT MAX(Nno) FROM tblNiche";
    $getMaxNnoStmt = $conn->prepare($getMaxNnoSql);
    $getMaxNnoStmt->execute();
<<<<<<< HEAD
    $getMaxNnoStmt->bind_result($maxNno);
    $getMaxNnoStmt->fetch();
    
=======
    $maxNno = $getMaxNnoStmt->fetchColumn();

<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
    // If maxNno is NULL (no existing Nno), start from 1, otherwise, increment it
>>>>>>> b72c3c4ba43fb1f2e4ade966189cf6b3d95c1687
>>>>>>> c9be5642966b076214c66ae87a16a96449635e9f
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
    if ($maxNno === null) {
        $maxNno = 0;
    }
    $getMaxNnoStmt->close();
    
    $counter = 1;

<<<<<<< HEAD
    $insertSql = "INSERT INTO tblNiche (Nid, LocID, Level, Size, Status, Nno) VALUES (?,?, ?, ?, 0, ?)";
    $stmt = $conn->prepare($insertSql);
    $stmt->bind_param('ssssi', $nicherow, $locID, $level, $size, $nno);
 
    
    $stmt1 = "INSERT INTO TBL_Audit_Trail (User_ID, Action) VALUES (?, 'Add Niche')";
    $insertAudit = $conn->prepare($stmt1);
    $insertAudit->bind_param('i', $userID);
=======
<<<<<<< HEAD
    $counter = 1;

=======
<<<<<<< HEAD
    $counter = 1;

=======
    $counter = 1; // Initialize a counter

    // Prepare the insert statement outside the loop
>>>>>>> b72c3c4ba43fb1f2e4ade966189cf6b3d95c1687
>>>>>>> c9be5642966b076214c66ae87a16a96449635e9f
    $insertSql = "INSERT INTO tblNiche (Nid, LocID, Level, Size, Status, Nno) VALUES (?,?, ?, ?, 0, ?)";
    $stmt = $conn->prepare($insertSql);
    $stmt->bindParam(1, $nicherow, PDO::PARAM_STR);
    $stmt->bindParam(2, $locID, PDO::PARAM_STR);
    $stmt->bindParam(3, $level, PDO::PARAM_STR);
    $stmt->bindParam(4, $size, PDO::PARAM_INT);
    $stmt->bindParam(5, $nno, PDO::PARAM_INT);
<<<<<<< HEAD

    
    $stmt1 = "INSERT INTO TBL_Audit_Trail (User_ID, Date, Timex, Action) VALUES (?, GETDATE(), ?, 'Add Niche')";
    $insertAudit = $conn->prepare($stmt1);
    $insertAudit->bindParam(1, $userID, PDO::PARAM_STR);
    $insertAudit->bindParam(2, $currentDateTime, PDO::PARAM_STR);
    $insertAudit->execute();
=======
>>>>>>> b72c3c4ba43fb1f2e4ade966189cf6b3d95c1687

    
    $stmt1 = "INSERT INTO TBL_Audit_Trail (User_ID, Date, Timex, Action) VALUES (?, GETDATE(), ?, 'Add Niche')";
    $insertAudit = $conn->prepare($stmt1);
    $insertAudit->bindParam(1, $userID, PDO::PARAM_STR);
    $insertAudit->bindParam(2, $currentDateTime, PDO::PARAM_STR);
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
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
                        window.location.href = '../admin/addniche.php?locid=". $locID . "';
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
                        window.location.href = '../admin/addniche.php?locid=". $locID. "';
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
        window.location.href = '../admin/niche.php?locid=". $locID . "&profid=" . $profid . "';
    }, 1000); 
    </script>";
    
} else {
    echo "Invalid input. Please check the fields.";
    die();
}
?>