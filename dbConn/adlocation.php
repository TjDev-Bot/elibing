
<?php
include "conn.php";
require_once('../component/nicfunction.php');

$locID = $_POST['locid'];
$nicheno = $_POST['nicheno'];
$level = $_POST['level'];
$stat = $_POST['stat'];
$size = $_POST['size'];
// Check if the input values are valid
if (is_numeric($nicheno) || $nicheno > 0 || !empty($locID) || !empty($level) || !empty($stat) || !empty($size)) {
    $batchSize = 10;
    $numBatches = ceil($nicheno / $batchSize);

    // Prepare the insert statement outside the loop
    $insertSql = "INSERT INTO tblNiche (Nid, LocID, Level, Size,Status) VALUES (?,?, ?, ?, 0)";
    $stmt = $conn->prepare($insertSql);
    $stmt->bindParam(1, $nicherow, PDO::PARAM_STR);
    $stmt->bindParam(2, $locID, PDO::PARAM_STR);
    $stmt->bindParam(3, $level, PDO::PARAM_STR);
    $stmt->bindParam(4, $size, PDO::PARAM_INT);
    $stmt->bindParam(5, $stat, PDO::PARAM_INT);

    $counter = 1; // Initialize a counter

    for ($batch = 0; $batch < $numBatches; $batch++) {
        $batchStart = $batch * $batchSize;
        $batchEnd = min(($batch + 1) * $batchSize, $nicheno);

        for ($i = $batchStart; $i < $batchEnd; $i++) {
            $nicherow = nextNumb("N", "tblNiche", "Nid", 2, "");

            // Check if the generated Nid already exists
            $checkSql = "SELECT COUNT(*) AS count FROM tblNiche WHERE Nid = ?";
            $checkStmt = $conn->prepare($checkSql);
            $checkStmt->bindParam(1, $nicherow, PDO::PARAM_STR);
            $checkStmt->execute();
            $count = $checkStmt->fetchColumn();

            while ($count > 0) {
                
                echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    var modal = document.createElement('div');
                    modal.innerHTML = 'Nid: $nicherow already exists. Tring the next one';
                    modal.style.position = 'fixed';
                    modal.style.top = '20%';
                    modal.style.left = '50%';
                    modal.style.transform = 'translate(-50%, -50%)';
                    modal.style.backgroundColor = 'white';
                    modal.style.padding = '20px';
                    modal.style.border = '1px solid #ccc';
                    modal.style.boxShadow = '0 2px 10px rgba(0, 0, 0, 0.2)';
                    modal.style.zIndex = '9999';
        
                    document.body.appendChild(modal);
        
                
                });
                </script>";

                $counter++; // Increment the counter
                $nicherow = "N" . str_pad($counter, 2, '0', STR_PAD_LEFT);
                $checkStmt->bindParam(1, $nicherow, PDO::PARAM_STR);
                $checkStmt->execute();
                $count = $checkStmt->fetchColumn();
            }

            // If Nid is unique, insert it
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
        
            
                });
                </script>";
            } else {
                echo "An error occurred while inserting a row with Nid: $nicherow.<br>";
            }

            $counter++; // Increment the counter
        }

        usleep(100000);
    }

    $stmt->closeCursor();

    echo "<script>
        setTimeout(function () {
            window.location.href = '../admin/niche.php?LocId=$locID';
        }, 1000);
    </script>";
} else {
    echo "Invalid input. Please check the fields.";
    die();
}
// ?>

// <?php
// include "conn.php";
// require_once('../component/nicfunction.php');

// $maxExecutionTime = ini_get('max_execution_time'); // Get the maximum execution time

// $locID = $_POST['locid'];
// $nicheno = $_POST['nicheno'];
// $level = $_POST['level'];
// $stat = $_POST['stat'];
// $size = $_POST['size'];

// try {
//     if (is_numeric($nicheno) || $nicheno > 0 || !empty($locID) || !empty($level) || !empty($stat) || !empty($size)) {
//         // Prepare the insert statement outside the loop
//         $insertSql = "INSERT INTO tblNiche (Nid, Nno, LocID, Level, Size, Status) VALUES (?, ?, ?, ?, ?, 0)";
//         $stmt = $conn->prepare($insertSql);
        
//         $nnoCounter = 1; // Initialize Nno counter

//         for ($i = 0; $i < $nicheno; $i++) {
//             $nicherow = nextNumb("N", "tblNiche", "Nid", 2, ""); // Generate a new Nid

//             while (checkIfExists($conn, $nicherow, $nnoCounter)) {
//                 $nicherow = nextNumb("N", "tblNiche", "Nid", 2, "");
//             }

//             $stmt->bindParam(1, $nicherow, PDO::PARAM_STR);
//             $stmt->bindParam(2, $nnoCounter, PDO::PARAM_INT);
//             $stmt->bindParam(3, $locID, PDO::PARAM_STR);
//             $stmt->bindParam(4, $level, PDO::PARAM_STR);
//             $stmt->bindParam(5, $size, PDO::PARAM_INT);

//             // Attempt to insert the record
//             if ($stmt->execute()) {
//                 echo "<script>
//                     document.addEventListener('DOMContentLoaded', function() {
//                         var modal = document.createElement('div');
//                         modal.innerHTML = 'Niche Successfully Recorded';
//                         modal.style.position = 'fixed';
//                         modal.style.top = '40%';
//                         modal.style.left = '50%';
//                         modal.style.transform = 'translate(-50%, -50%)';
//                         modal.style.backgroundColor = 'white';
//                         modal.style.padding = '20px';
//                         modal.style.border = '1px solid #ccc';
//                         modal.style.boxShadow = '0 2px 10px rgba(0, 0, 0, 0.2)';
//                         modal.style.zIndex = '9999';
//                         document.body.appendChild(modal);
//                     });
//                 </script>";
//             } else {
//                 echo "An error occurred while inserting a row with Nid: $nicherow.<br>";
//             }
            
//             $nnoCounter++; // Increment the Nno counter
//             if (time() - $_SERVER['REQUEST_TIME_FLOAT'] >= $maxExecutionTime - 10) {
//                 // Save the current state, so it can be resumed later
//                 $remaining = $nicheno - $i;
//                 echo "<script>
//                     document.addEventListener('DOMContentLoaded', function() {
//                         var modal = document.createElement('div');
//                         modal.innerHTML = 'Script reached the time limit. Processing $remaining of $nicheno records...';
//                         modal.style.position = 'fixed';
//                         modal.style.top = '40%';
//                         modal.style.left = '50%';
//                         modal.style.transform = 'translate(-50%, -50%)';
//                         modal.style.backgroundColor = 'white';
//                         modal.style.padding = '20px';
//                         modal.style.border = '1px solid #ccc';
//                         modal.style.boxShadow = '0 2px 10px rgba(0, 0, 0, 0.2)';
//                         modal.style.zIndex = '9999';
//                         document.body.appendChild(modal);
//                     });
//                 </script>";
//                 break;
//             }
//             usleep(100000);
//         }
        
//         $stmt->closeCursor();
        
//         echo "<script>
//             setTimeout(function () {
//                 window.location.href = '../admin/niche.php?LocId=$locID';
//             }, 1000);
//         </script>";
//     } else {
//         echo "Invalid input. Please check the fields.";
//         die();
//     }
// } catch (PDOException $e) {
//     if ($e->errorInfo[1] === 2627) {
//         echo "A primary key violation occurred. You may want to handle this case differently.";
//     } else {
//         echo "An error occurred: " . $e->getMessage();
//     }
// }

// // Function to check if the Nid and Nno pair already exists
// function checkIfExists($conn, $nicherow, $nnoCounter) {
//     $checkSql = "SELECT COUNT(*) AS count FROM tblNiche WHERE Nid = ? AND Nno = ?";
//     $checkStmt = $conn->prepare($checkSql);
//     $checkStmt->bindParam(1, $nicherow, PDO::PARAM_STR);
//     $checkStmt->bindParam(2, $nnoCounter, PDO::PARAM_INT);
//     $checkStmt->execute();
//     $count = $checkStmt->fetchColumn();
//     return $count > 0;
// }
// ?>
