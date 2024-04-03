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
$fullname = $_POST['fullname'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$createdby = $_POST['create'];
$userID = $_POST['userid'];
$bday = $_POST['bday'];

$fulldec = $fname.' '.$mname.' '.$lname;

date_default_timezone_set('Asia/Manila'); 
$currentDateTime = date('h:i:s A');

try {
    if (!empty($lname) && !empty($fname)) {
        $duplicateCheckSQL = "SELECT COUNT(*) as count FROM tblDeathRecord WHERE Lname = ? AND Fname = ? AND MName = ? AND Suffix = ?";
        $duplicateStmt = $conn->prepare($duplicateCheckSQL);
        $duplicateStmt->bind_param('ssss', $lname, $fname, $mname, $suffix);
        $duplicateStmt->execute();
        $result = $duplicateStmt->get_result()->fetch_assoc();
        
        if ($result['count'] > 0) {
            echo '<script type="text/javascript">alert("Duplicate entry: A record with the same name and suffix already exists."); window.location.href = "../staff/form.php";</script>';
            exit;
        } else {

            $sql = "INSERT INTO tblDeathRecord (Lname, Fname, MName, Suffix, DateofDeath, CauseofDeath, IntermentPlace, Birthydate) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ssssssss', $lname, $fname, $mname, $suffix, $dateofdeath, $causeofdeath, $intermentplace, $bday);

            if ($stmt->execute()) {
                $profileID = $conn->insert_id;

                $sqlreserve = "INSERT INTO tblIntermentReservation (Relationship, Requestor, ProfID) VALUES (?, ?, ?)";
                $stmtreserve = $conn->prepare($sqlreserve);
                $stmtreserve->bind_param('sss', $relationship, $fullname, $profileID);

                $sqlcontact = "INSERT INTO tblContactInfo (ProfID, ContactNo, Email, Createdby, CreatedWhen, CreatedSoftwareby, ModifiedSoftwareby) VALUES (?, ?, ?, ?, CURDATE(), 'E-Libing','E-Libing')";
                $stmtcontact = $conn->prepare($sqlcontact);
                $stmtcontact->bind_param('ssss', $profileID, $contact, $email, $createdby);

                $stmt2 = "INSERT INTO TBL_Audit_Trail (User_ID, Action) VALUES (?, 'New Added Occupant: ".$fulldec."')";
                $insertAudit = $conn->prepare($stmt2);
                $insertAudit->bind_param('i', $userID);

                if ($stmtreserve->execute() && $stmtcontact->execute() && $insertAudit->execute()) {
                    header("Location: ../staff/location.php?id=" . $profileID);
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
                            window.location.href = '../staff/form.php';
                        }, 1000); 
                    });
                  </script>";
                }
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
                        window.location.href = '../staff/form.php';
                    }, 1000); 
                });
              </script>";
            }
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
