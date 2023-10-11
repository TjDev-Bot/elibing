<?php
include "conn.php";
include "../component/function.php";

// if(isset($_GET['Nid'])){
//     $nicheno = $_GET['Nid'];
// }
$relationship = $_POST['relationship'];
$lname = $_POST['Lname'];
$fname = $_POST['Fname'];
$mname = $_POST['MName'];
$suffix = $_POST['Suffix'];
$dateofdeath = $_POST['deathdate'];
$causeofdeath = $_POST['cod'];
$intermentplace = $_POST['IntermentPlace'];
$nicheno = $_POST['Nid'];
$appointmentID = nextNumb("APP", "tblIntermentReservation", "AppointmentID",7,23);
$profileID = nextnumb("PROF", "tblDeathRecord","ProfileID",7, 23);

// $trunc = substr($profileID, 0, 5);
// $intermentdate = $_POST['IntermentDate'];
// $intermenttime = $_POST['IntermentTime'];

// $block = $_POST['block_id'];



if(!empty($lname) || !empty($fname) || !empty($mname) || !empty($suffix) || 
!empty($dateofdeath || !empty($causeofdeath) || !empty($intermentplace) || !empty($relationship)   )
) {
    //Insert Data for tblDeathRecord
    $sql = "INSERT INTO tblDeathRecord (ProfileID, Lname, Fname, MName, Suffix, DateofDeath, CauseofDeath, IntermentPlace) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $profileID, PDO::PARAM_STR);
    $stmt->bindParam(2, $lname, PDO::PARAM_STR);
    $stmt->bindParam(3, $fname, PDO::PARAM_STR);
    $stmt->bindParam(4, $mname, PDO::PARAM_STR);
    $stmt->bindParam(5, $suffix, PDO::PARAM_STR);
    $stmt->bindParam(6, $dateofdeath, PDO::PARAM_STR);
    $stmt->bindParam(7, $causeofdeath, PDO::PARAM_STR);
    $stmt->bindParam(8, $intermentplace, PDO::PARAM_STR);


    //Insert Data for tblIntermentReservation
    $sqlreserve = "INSERT INTO tblIntermentReservation (AppointmentID ,Nid, Relationship, ProfID) VALUES (?, ?, ?, ?)";
    $stmtreserve = $conn->prepare($sqlreserve);
    $stmtreserve->bindParam(1, $appointmentID, PDO::PARAM_STR);
    $stmtreserve->bindParam(2, $nicheno, PDO::PARAM_STR);
    $stmtreserve->bindParam(3, $relationship, PDO::PARAM_STR);
    $stmtreserve->bindParam(4, $profileID, PDO::PARAM_STR);


    $update = "UPDATE tblNiche SET Status = 1 WHERE Nid = '$nicheno'";
    $stmtupdate = $conn->prepare($update);
    // $stmtupdate->exeute([]);
   

    // $full = $fname.' '.$mname.' '.$lname;
    if ($stmt->execute() && $stmtreserve->execute() && $stmtupdate->execute()) {
        // $block = $loc_id;

        echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            var modal = document.createElement('div');
            modal.innerHTML = 'Data stored';
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
                window.location.href = '../admin/reserve.php';
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
                        window.location.href = '../admin/occupant.php?id=$nicheno';
                    }, 1000); 
                });
              </script>";
    }

    $stmt = null;
} else {
echo "All fields are required";
die();
}

?>

