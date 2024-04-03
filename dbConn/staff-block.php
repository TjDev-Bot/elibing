<?php
include "conn.php";
include "../component/locfunction.php";

try {
    $locID = nextNumb("L", "tblNicheLocation", "LocID", 4, "");
    $nlname = isset($_POST['nlname']) ? $_POST['nlname'] : '';
    $size = isset($_POST['size']) ? $_POST['size'] : null; 
    $des = isset($_POST['description']) ? $_POST['description'] : '';
    $type = isset($_POST['type']) ? $_POST['type'] : '';
    $userID = isset($_POST['userid']) ? $_POST['userid'] : '';
    date_default_timezone_set('Asia/Manila'); 

    // Use a single prepared statement for both checks and insert
    $sql = "INSERT INTO tblNicheLocation (LocID, NLName, Size, Description, Type) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssiss", $locID, $nlname, $size, $des, $type);

    // Check if the LocID already exists
    $checkSql = "SELECT COUNT(*) AS count FROM tblNicheLocation WHERE LocID = ?";
    $checkStmt = $conn->prepare($checkSql);
    $checkStmt->bind_param("s", $locID);
    $checkStmt->execute();
    $checkStmt->bind_result($count);
    $checkStmt->fetch();
    
    $checkStmt->close(); // Close the check statement

    // If LocID already exists, generate a new one
    while ($count > 0) {
        $locID = nextNumb("L", "tblNicheLocation", "LocID", 3, $locID);
        
        $checkStmt = $conn->prepare($checkSql); // Prepare a new statement for the next iteration
        $checkStmt->bind_param("s", $locID);
        $checkStmt->execute();
        $checkStmt->bind_result($count);
        $checkStmt->fetch();
        
        $checkStmt->close(); // Close the check statement
    }

    // Insert the data
    if ($stmt->execute()) {
        $stmt1 = $conn->prepare("INSERT INTO TBL_Audit_Trail (User_ID, Action) VALUES (?, 'Add Block: ".$type."')");
        $stmt1->bind_param("i", $userID);
        $stmt1->execute();

        echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            var modal = document.createElement('div');
            modal.style.position = 'fixed';
            modal.style.top = '50%';
            modal.style.left = '50%';
            modal.style.transform = 'translate(-50%, -50%)';
            modal.style.backgroundColor = 'white';
            modal.style.padding = '20px';
            modal.style.border = '1px solid #ccc';
            modal.style.boxShadow = '0 2px 10px rgba(0, 0, 0, 0.2)';
            modal.style.zIndex = '9999';
            modal.innerHTML = 'Your Block is Successfully Recorded';

            document.body.appendChild(modal);

            setTimeout(function () {
                modal.style.display = 'none';
                window.location.href = '../staff/masterprofile.php?';
            }, 1000); 
        });
        </script>";
    } else {
        // Error handling for any other issues
        echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            var modal = document.createElement('div');
            modal.style.position = 'fixed';
            modal.style.top = '50%';
            modal.style.left = '50%';
            modal.style.transform = 'translate(-50%, -50%)';
            modal.style.backgroundColor = 'white';
            modal.style.padding = '20px';
            modal.style.border = '1px solid #ccc';
            modal.style.boxShadow = '0 2px 10px rgba(0, 0, 0, 0.2)';
            modal.style.zIndex = '9999';
            modal.innerHTML = 'An error occurred while processing the form. Please try again later';

            document.body.appendChild(modal);

            setTimeout(function () {
                modal.style.display = 'none';
                window.location.href = '../staff/masterprofile.php';
            }, 1000); 
        });
        </script>";
    }

    $stmt->close();
    $conn->close();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
