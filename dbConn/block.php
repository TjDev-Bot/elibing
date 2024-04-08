<?php
include "conn.php";
include "../component/locfunction.php";

try {
    $locID = nextNumb("L", "tblNicheLocation", "LocID", 4, "");
<<<<<<< HEAD
    $nlname = isset($_POST['nlname']) ? $_POST['nlname'] : '';
    $size = isset($_POST['size']) ? $_POST['size'] : null; 
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> c9be5642966b076214c66ae87a16a96449635e9f
    $nlname = isset($_POST['nlname']) ? $_POST['nlname'] : '';
    $size = isset($_POST['size']) ? $_POST['size'] : null; // Use null for missing size
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
    $des = isset($_POST['description']) ? $_POST['description'] : '';
    $type = isset($_POST['type']) ? $_POST['type'] : '';
    $userID = isset($_POST['userid']) ? $_POST['userid'] : '';
    date_default_timezone_set('Asia/Manila'); 
<<<<<<< HEAD

    // Use a single prepared statement for both checks and insert
    $sql = "INSERT INTO tblNicheLocation (LocID, NLName, Size, Description, Type) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssiss", $locID, $nlname, $size, $des, $type);
=======
    $currentDateTime = date('h:i:s A');
<<<<<<< HEAD
=======
=======
    $nlname = $_POST['nlname'];
    $size = $_POST['size'];
    $des = $_POST['description'];
    $type = $_POST['type'];
    $profid = $_POST['profid'];
    $name = $_POST['name'];
>>>>>>> b72c3c4ba43fb1f2e4ade966189cf6b3d95c1687
>>>>>>> c9be5642966b076214c66ae87a16a96449635e9f
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed

    $checkSql = "SELECT COUNT(*) AS count FROM tblNicheLocation WHERE LocID = ?";
    $checkStmt = $conn->prepare($checkSql);
    $checkStmt->bind_param("s", $locID);
    $checkStmt->execute();
    $checkStmt->bind_result($count);
    $checkStmt->fetch();
    
    $checkStmt->close(); // Close the check statement

<<<<<<< HEAD
    // If LocID already exists, generate a new one
    while ($count > 0) {
=======
 while ($count > 0) {
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
        $locID = nextNumb("L", "tblNicheLocation", "LocID", 3, $locID);
        
        $checkStmt = $conn->prepare($checkSql); // Prepare a new statement for the next iteration
        $checkStmt->bind_param("s", $locID);
        $checkStmt->execute();
        $checkStmt->bind_result($count);
        $checkStmt->fetch();
        
        $checkStmt->close(); // Close the check statement
    }

<<<<<<< HEAD
    // Insert the data
    if ($stmt->execute()) {
        $stmt1 = $conn->prepare("INSERT INTO TBL_Audit_Trail (User_ID, Action) VALUES (?, 'Add Block: ".$type."')");
        $stmt1->bind_param("i", $userID);
        $stmt1->execute();

=======
    $sql = "INSERT INTO tblNicheLocation (LocID, NLName, Size, Description, Type) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $locID, PDO::PARAM_STR);
    $stmt->bindParam(2, $nlname, PDO::PARAM_STR);
    $stmt->bindParam(3, $size, is_numeric($size) ? PDO::PARAM_INT : PDO::PARAM_NULL); 
    $stmt->bindParam(4, $des, PDO::PARAM_STR);
    $stmt->bindParam(5, $type, PDO::PARAM_STR);

    $stmt1 = "INSERT INTO TBL_Audit_Trail (User_ID, Date, Timex, Action) VALUES (?, GETDATE(), ?, 'Add Block: ".$type."')";
    $insertAudit = $conn->prepare($stmt1);
    $insertAudit->bindParam(1, $userID, PDO::PARAM_STR);
    $insertAudit->bindParam(2, $currentDateTime, PDO::PARAM_STR);

    if ($stmt->execute() && $insertAudit->execute()) {
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
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
<<<<<<< HEAD
                window.location.href = '../admin/masterprofile.php';
=======
<<<<<<< HEAD
                window.location.href = '../admin/masterprofile.php';
=======
<<<<<<< HEAD
                window.location.href = '../admin/masterprofile.php';
=======
                window.location.href = '../admin/location.php?id=" . $profid . "&name=" . $name . "';
>>>>>>> b72c3c4ba43fb1f2e4ade966189cf6b3d95c1687
>>>>>>> c9be5642966b076214c66ae87a16a96449635e9f
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
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
