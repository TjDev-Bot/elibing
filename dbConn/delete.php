<?php
include('conn.php');
try {
    if (isset($_GET['id'])) {
        $blockId = $_GET['id'];
        
        
        // First, delete from the location table
        $locationSql = "DELETE FROM location WHERE block_id = ?";
        $locationStmt = $conn->prepare($locationSql);
        $locationStmt->bind_param('i', $blockId);
        
        if ($locationStmt->execute()) {
            $userSql = "DELETE FROM block WHERE block_id = ?";
            $userStmt = $conn->prepare($userSql);
            $userStmt->bind_param('i', $blockId);
            
            if ($userStmt->execute()) {
                $conn->commit();
                echo '<script type="text/javascript"> alert("Successfully deleted the data with ID ' . $blockId . ' and associated records from the tables."); window.location.href = "../admin/location.php"; </script>';
            } else {
                $conn->rollback();
                throw new Exception("Error executing user DELETE statement: " . $userStmt->error);
            }
        } else {
            $conn->rollback();
            throw new Exception("Error executing location DELETE statement: " . $locationStmt->error);
        }
    } else {
        echo "Invalid request. Please provide a valid User ID.";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

$conn->close();
?>