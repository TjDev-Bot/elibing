<?php
include "conn.php";

include "../component/locfunction.php";



try {
    // function getMaxLocID($conn) {
    //     $query = "SELECT MAX(CAST(INT, SUBSTRING(LocID, 2, LEN(LocID) - 1))) AS max_locid FROM tblNicheLocation";
    //     $stmt = $conn->prepare($query);
    //     $stmt->execute();
    //     $result = $stmt->fetch(PDO::FETCH_ASSOC);
    //     $maxLocID = $result['max_locid'];
    
    //     return $maxLocID;
    // }
    
    
    // $existingMaxLocID = getMaxLocID($conn);
    
    // $nextLocID = $existingMaxLocID + 1; 
    
    $locID = nextNumb("L", "tblNicheLocation", "LocID", 3, "");
    
    $sql = "INSERT INTO tblNicheLocation (LocID) VALUES (?)";   
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $locID, PDO::PARAM_STR);
    
    if ($stmt->execute()) {
        echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            var modal = document.createElement('div');
            modal.innerHTML = 'Your Block is Successfully Recorded';
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
                window.location.href = '../admin/location.php';
            }, 1000); 
        });
        </script>";
    } else {
        // Error handling for any other issues
        echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            var modal = document.createElement('div');
            modal.innerHTML = 'An error occurred while processing the form. Please try again later.';
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
                window.location.href = '../admin/location.php';
            }, 1000); 
        });
        </script>";
    }
} catch (PDOException $e) {
    // Handle any other PDO exceptions here
    echo "Error: " . $e->getMessage();
}

// $stmt->closeCursor();
$conn = null;
?>