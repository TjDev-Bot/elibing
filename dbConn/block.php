<?php
include "conn.php";
include "../component/locfunction.php";


try {
    $locID = nextNumb("L", "tblNicheLocation", "LocID", 4, "");
    $nlname = $_POST['nlname'];
    $size = $_POST['size'];
    $des = $_POST['description'];
    $type = $_POST['type'];
    $profid = $_POST['profid'];
    $name = $_POST['name'];

    // Check if the LocID already exists
    $checkSql = "SELECT COUNT(*) AS count FROM tblNicheLocation WHERE LocID = ?";
    $checkStmt = $conn->prepare($checkSql);
    $checkStmt->bindParam(1, $locID, PDO::PARAM_STR);
    $checkStmt->execute();
    $result = $checkStmt->fetch(PDO::FETCH_ASSOC);
    $count = $result['count'];

    // If LocID is a duplicate, keep incrementing it until a non-duplicate value is found
    while ($count > 0) {
        $locID = nextNumb("L", "tblNicheLocation", "LocID", 3, $locID);
        $checkStmt->bindParam(1, $locID, PDO::PARAM_STR);
        $checkStmt->execute();
        $result = $checkStmt->fetch(PDO::FETCH_ASSOC);
        $count = $result['count'];
    }

    // Insert the non-duplicate LocID
    $sql = "INSERT INTO tblNicheLocation (LocID, NLName, Size, Description, Type) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $locID, PDO::PARAM_STR);
    $stmt->bindParam(2, $nlname, PDO::PARAM_STR);
    $stmt->bindParam(3, $size, PDO::PARAM_STR);
    $stmt->bindParam(4, $des, PDO::PARAM_STR);
    $stmt->bindParam(5, $type, PDO::PARAM_STR);

    if ($stmt->execute()) {
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
                window.location.href = '../admin/masterprofile.php?';
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
                window.location.href = '../admin/location.php?id=" . $profid . "&name=" . $name . "';
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