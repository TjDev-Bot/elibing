<?php
include "conn.php";

$block_id = $_POST['bid'];
$nicheno = $_POST['nicheno'];
$level = $_POST['level'];

if (!empty($nicheno) || !empty($level)) {
    $query = "SELECT MAX(CAST(SUBSTRING_INDEX(nicheno, ' ', -1) AS UNSIGNED)) AS max_nicheno FROM location WHERE block_id = ? AND level = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("is", $block_id, $level);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $max_nicheno = $row['max_nicheno'];

    for ($i = 1; $i <= $nicheno; $i++) {
        $nicherow = "Niche No " . ($max_nicheno + $i); 
        $sql = "INSERT INTO location (block_id, nicheno, level, status) VALUES (?, ?, ?, '')";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $block_id, $nicherow, $level);

        if ($stmt->execute()) {
            echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                var modal = document.createElement('div');
                modal.innerHTML = 'Your Niche is Successfully Recorded';
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
                    window.location.href = '../admin/niche.php?id=$block_id';
                }, 1000); 
            });
          </script>";
        } else {
            echo "<script>
                    document.addEventListener('DOMContentLoaded', function() {
                        var modal = document.createElement('div');
                        modal.innerHTML = 'Your Niche is Successfully Recorded';
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
                            window.location.href = '../admin/niche.php?id=$block_id';
                        }, 1000); 
                    });
                  </script>";
        }

        $stmt->close();
    }
} else {
    echo "All fields are required";
    die();
}
?>


