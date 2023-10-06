<?php
include('conn.php');

if(isset($_GET['loc_id'])){
    $delId = $_GET['loc_id'];
}

if(isset($_GET['block_id'])){
    $block_id = $_GET['block_id'];
}

try {
    $sql = "DELETE FROM location WHERE location_id = ?";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param('i', $delId);

    if ($stmt->execute()) {
        $affectedRows = $stmt->affected_rows;
        if ($affectedRows > 0) {
            // Display a JavaScript popup success message on page load
            echo '<script type="text/javascript"> alert("Successfully deleted the data with ID ' . $delId . ' and associated records from the tables."); window.location.href = "../admin/niche.php?id='.$block_id.'"; </script>';
        } else {
            // Display a JavaScript popup message for no rows deleted on page load
            echo '<script type="text/javascript"> alert("No rows were deleted."); window.location.href = "../admin/niche.php?id='.$block_id.'"; </script>';
        }
    } else {
        throw new Exception("Error executing DELETE statement: " . $stmt->error);
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

$conn->close();
?>