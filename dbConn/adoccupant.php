<?php
include "conn.php";

$lname = $_POST['Lname'];
$fname = $_POST['Fname'];
$mname = $_POST['MName'];
$suffix = $_POST['Suffix'];
$dateofdeath = $_POST['DateofDeath'];
$causeofdeath = $_POST['CauseofDeath'];
$intermentplace = $_POST['IntermentPlace'];
$intermentdate = $_POST['IntermentDate'];
$intermenttime = $_POST['IntermentTime'];

$loc_id = $_POST['loc_id'];
$block = $_POST['block_id'];
$nicheno = $_POST['nicheno'];
$level = $_POST['level'];



if(!empty($lname) || !empty($fname) || !empty($mname) || !empty($suffix) || 
!empty($dateofdeath || !empty($causeofdeath) || !empty($intermentplace) || !empty($intermentdate) ||
!empty($intermenttime) || !empty($loc_id) || !empty($block) || !empty($nicheno) || !empty($level))
) {
    $sql = "INSERT INTO occupant (location_id, block_id, nicheno, level, lname, fname, mname, suffix, dateofdeath, causeofdeath, intermentplace, intermentdate, intermenttime) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iisisssssssss", $loc_id, $block, $nicheno, $level, $lname, $fname, $mname, $suffix, $dateofdeath, $causeofdeath, $intermentplace, $intermentdate, $intermenttime);

    $update = "UPDATE location SET status = 'occupied' WHERE location_id = ?";
    $updateStmt = $conn->prepare($update);
    $updateStmt->bind_param("i", $loc_id);
    if ($stmt->execute() && $updateStmt->execute()) {
        $block = $loc_id;

        echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            var modal = document.createElement('div');
            modal.innerHTML = 'Your Data is Successfully Recorded';
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
                window.location.href = '../admin/occupant.php?id=$block';
            }, 1000); 
        });
      </script>";
    } else {
        echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    var modal = document.createElement('div');
                    modal.innerHTML = 'Something went wrong';
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
                        window.location.href = '../admin/occupant.php?id=$block';
                    }, 1000); 
                });
              </script>";
    }

    $stmt->close();
    $updateStmt->close();
} else {
echo "All fields are required";
die();
}

?>