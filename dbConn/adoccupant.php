<?php
include "conn.php";
include "../component/function.php";

$relationship = $_POST['relationship'];
$lname = $_POST['Lname'];
$fname = $_POST['Fname'];
$mname = $_POST['MName'];
$suffix = $_POST['Suffix'];
$dateofdeath = $_POST['DateofDeath'];
$causeofdeath = $_POST['CauseofDeath'];
$intermentplace = $_POST['IntermentPlace'];
$nicheno = $_POST['Nid'];
$appointmentID = nextNumb("APP", "tblIntermentReservation", "AppointmentID", 7, 23);
$profileID = nextNumb("PROF", "tblDeathRecord", "ProfileID", 7, 23);
$fullname = $_POST['fullname'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$createdby = $_POST['create'];
<<<<<<< HEAD
$userID = $_POST['userid'];
$bday = $_POST['bday'];

date_default_timezone_set('Asia/Manila'); 
$currentDateTime = date('h:i:s A');

try {
    if (!empty($lname) && !empty($fname) && !empty($mname)) {
        $duplicateCheckSQL = "SELECT COUNT(*) as count FROM tblDeathRecord WHERE Lname = ? AND Fname = ? AND MName = ? AND Suffix = ?";
        $duplicateStmt = $conn->prepare($duplicateCheckSQL);
        $duplicateStmt->bindParam(1, $lname, PDO::PARAM_STR);
        $duplicateStmt->bindParam(2, $fname, PDO::PARAM_STR);
        $duplicateStmt->bindParam(3, $mname, PDO::PARAM_STR);
        $duplicateStmt->bindParam(4, $suffix, PDO::PARAM_STR);
        $duplicateStmt->execute();
        $result = $duplicateStmt->fetch(PDO::FETCH_ASSOC);
    
        if ($result['count'] > 0) {
            if ($result['count'] > 0) {
                echo '<script type="text/javascript">alert("Duplicate entry: A record with the same name and suffix already exists."); window.location.href = "../admin/form.php";</script>';
                exit; 
            } 
        }else {
        

            // Insert Data for tblDeathRecord
            $sql = "INSERT INTO tblDeathRecord (ProfileID, Lname, Fname, MName, Suffix, DateofDeath, CauseofDeath, IntermentPlace, Birthydate) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $profileID, PDO::PARAM_STR);
            $stmt->bindParam(2, $lname, PDO::PARAM_STR);
            $stmt->bindParam(3, $fname, PDO::PARAM_STR);
            $stmt->bindParam(4, $mname, PDO::PARAM_STR);
            $stmt->bindParam(5, $suffix, PDO::PARAM_STR);
            $stmt->bindParam(6, $dateofdeath, PDO::PARAM_STR);
            $stmt->bindParam(7, $causeofdeath, PDO::PARAM_STR);
            $stmt->bindParam(8, $intermentplace, PDO::PARAM_STR);
            $stmt->bindParam(9, $bday, PDO::PARAM_STR);
    
            // Insert Data for tblIntermentReservation
            $sqlreserve = "INSERT INTO tblIntermentReservation (AppointmentID, Relationship, Requestor, ProfID) VALUES (?, ?, ?, ?)";
            $stmtreserve = $conn->prepare($sqlreserve);
            $stmtreserve->bindParam(1, $appointmentID, PDO::PARAM_STR);
            $stmtreserve->bindParam(2, $relationship, PDO::PARAM_STR);
            $stmtreserve->bindParam(3, $fullname, PDO::PARAM_STR);
            $stmtreserve->bindParam(4, $profileID, PDO::PARAM_STR);
    

=======

try {
    if (!empty($lname) && !empty($fname) && !empty($mname)) {
        $duplicateCheckSQL = "SELECT COUNT(*) as count FROM tblDeathRecord WHERE Lname = ? AND Fname = ? AND MName = ? AND Suffix = ?";
        $duplicateStmt = $conn->prepare($duplicateCheckSQL);
        $duplicateStmt->bindParam(1, $lname, PDO::PARAM_STR);
        $duplicateStmt->bindParam(2, $fname, PDO::PARAM_STR);
        $duplicateStmt->bindParam(3, $mname, PDO::PARAM_STR);
        $duplicateStmt->bindParam(4, $suffix, PDO::PARAM_STR);
        $duplicateStmt->execute();
        $result = $duplicateStmt->fetch(PDO::FETCH_ASSOC);
    
        if ($result['count'] > 0) {
            if ($result['count'] > 0) {
                echo '<script type="text/javascript">alert("Duplicate entry: A record with the same name and suffix already exists."); window.location.href = "form.php";</script>';
                exit; 
            } 
        }else {
            // Insert Data for tblDeathRecord
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
    
            // Insert Data for tblIntermentReservation
            $sqlreserve = "INSERT INTO tblIntermentReservation (AppointmentID, Relationship, Requestor, ProfID) VALUES (?, ?, ?, ?)";
            $stmtreserve = $conn->prepare($sqlreserve);
            $stmtreserve->bindParam(1, $appointmentID, PDO::PARAM_STR);
            $stmtreserve->bindParam(2, $relationship, PDO::PARAM_STR);
            $stmtreserve->bindParam(3, $fullname, PDO::PARAM_STR);
            $stmtreserve->bindParam(4, $profileID, PDO::PARAM_STR);
    

>>>>>>> b72c3c4ba43fb1f2e4ade966189cf6b3d95c1687
            $sqlcontact = "INSERT INTO tblContactInfo (ProfID, ContactNo, Email, Createdby, CreatedWhen, CreatedSoftwareby, ModifiedSoftwareby) VALUES (?, ?, ?, ?, GETDATE(), 'E-Libing','E-Libing')";
            $stmtcontact = $conn->prepare($sqlcontact);
            $stmtcontact->bindParam(1, $profileID, PDO::PARAM_STR);
            $stmtcontact->bindParam(2, $contact, PDO::PARAM_STR);
            $stmtcontact->bindParam(3, $email, PDO::PARAM_STR);
            $stmtcontact->bindParam(4, $createdby, PDO::PARAM_STR);
            
<<<<<<< HEAD

            $stmt2 = "INSERT INTO TBL_Audit_Trail (User_ID, Date, Timex, Action) VALUES (?, GETDATE(), ?, 'New Added Occupant: ".$fullname."')";
            $insertAudit = $conn->prepare($stmt2);
            $insertAudit->bindParam(1, $userID, PDO::PARAM_STR);
            $insertAudit->bindParam(2, $currentDateTime, PDO::PARAM_STR);
            if ($stmt->execute() && $stmtreserve->execute() && $stmtcontact->execute() && $insertAudit->execute()) {
=======
            if ($stmt->execute() && $stmtreserve->execute() && $stmtcontact->execute()) {
>>>>>>> b72c3c4ba43fb1f2e4ade966189cf6b3d95c1687
                echo "<script>
                    document.addEventListener('DOMContentLoaded', function() {
                        var modal = document.createElement('div');
                        modal.innerHTML = 'Proceed to Scheduling';
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
                            window.location.href = '../admin/scheds.php?id=" . $profileID ."';
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
                                window.location.href = '../admin/form.php';
                            }, 1000); 
                        });
                      </script>";
            }
    
            $stmt = null;
        }
    } else {
        echo "All fields are required";
        die();
    }
} catch (PDOException $e) {
    if ($e->getCode() === '22001') {
        echo "Data too long for a database column. Please provide shorter data.";
    } else {
        echo "An error occurred: " . $e->getMessage();
    }
}


?>