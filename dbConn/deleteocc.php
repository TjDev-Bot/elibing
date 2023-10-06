<?php
include('conn.php');

if(isset($_GET['occ_id'])){
    $delId = $_GET['occ_id'];
}

if(isset($_GET['block_id'])){
    $block_id = $_GET['block_id'];
}

try {
    $sql = "DELETE FROM occupant WHERE occupant_id = ?";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param('i', $delId);

    if ($stmt->execute()) {
        $affectedRows = $stmt->affected_rows;
        if ($affectedRows > 0) {
            $updateStatusSql = "UPDATE location SET status = 'not occupied' WHERE location_id = ?";
            $stmtUpdate = $conn->prepare($updateStatusSql);
            $stmtUpdate->bind_param('i', $delId);
            $stmtUpdate->execute();

            echo '<script type="text/javascript"> alert("Successfully deleted the data with ID ' . $delId . ' and updated the status to not occupied."); window.location.href = "../admin/niche.php?id='.$block_id.'"; </script>';
        } else {
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