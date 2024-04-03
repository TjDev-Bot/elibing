<?php
include('conn.php');

try {
    if (isset($_GET['id'])) {
        $userID = $_GET['id'];


        $deleteUser = "DELETE FROM tblUsersLogin WHERE UserID = ?";
        $intermentStmt = $conn->prepare($deleteUser);
        $intermentStmt->execute([$userID]);


        // Commit the transaction
        $conn->commit();

        header("Location: ../admin/user.php");
    } else {
        echo "Invalid request. Please provide a valid ID.";
    }
} catch (Exception $e) {
    $conn->rollback();
    echo "Error: " . $e->getMessage();
}

$conn = null; 
?>