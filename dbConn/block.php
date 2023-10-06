<?php
include "conn.php";
   
$sql = "INSERT INTO block (block_id) VALUES (?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
      
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
    "<script>
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
    echo "Error: " . $stmt->error;
}

$stmt->close();
?>