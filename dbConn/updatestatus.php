<?php

include "conn.php";

$nid = $_POST['nid'];


$profileID = $_POST['profid'];
$full = $_POST['name'];
echo
$update = "UPDATE tblNiche SET Status = 2 WHERE Nid = '$nid'";
$stmtupdate = $conn->prepare($update);

if ($stmtupdate->execute()) {
    $full = $full;
    $profileID = $profileID;
    echo "<script>
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

    document.body.appendChild(modal);

    setTimeout(function () {
        modal.style.display = 'none';
        window.location.href = '../admin/scheds.php?id=" . $profileID . "&name=" . $full . "';
    }, 1000); // 100 milliseconds
  </script>";
} else {
    echo "<script>
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

        document.body.appendChild(modal);

        setTimeout(function () {
            modal.style.display = 'none';
            window.location.href = '../admin/viewreserve.php';
        }, 100); // 100 milliseconds
    </script>";
}
$stmtupdate = null;

?>