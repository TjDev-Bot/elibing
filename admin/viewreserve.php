<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="css/walkin.css">


<?php
require('assets/component/header.php');
require('assets/component/topnavbar.php');
require('assets/component/sidebars.php');

include "../dbConn/conn.php";

if(isset($_GET['AppID'])){
    $appID = $_GET['AppID'];
    $selectreserve = "SELECT * FROM  tblNiche
    INNER JOIN tblIntermentReservation ON  tblNiche.Nid =  tblIntermentReservation.Nid 
    INNER JOIN tblNicheLocation ON tblNiche.LocID = tblNicheLocation.LocID
    INNER JOIN tblDeathRecord ON tblIntermentReservation.ProfID = tblDeathRecord.ProfileID WHERE AppointmentID = '$appID'";
    $queryreserve = $conn->query($selectreserve);
    while ($dataloc = $queryreserve->fetch_assoc()) {
        // $appointmentID = $dataloc['AppointmentID'];
        $relationship = $dataloc['Relationship'];
        $locID = $dataloc['LocID'];
        $nid = $dataloc['Nid'];
        $profID = $dataloc['ProfileID'];
        $name = $dataloc['Fname'].' '.$dataloc['Mname'].' '.$dataloc['Lname'];
        $status = $dataloc['Status'];
        $deathdate = $dataloc['DateofDeath'];
        $causeofdeath = $dataloc['CauseofDeath'];
        $intermentplace = $dataloc['IntermentPlace'];
        $nl = $dataloc['NLName'];

        $Nno = $dataloc['Nno'];
        $type = $dataloc['Type'];
        $level = $dataloc['Level'];
        $des = $dataloc['Description'];
    }
}
?>

<style>
.form-control-login {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

.form-control-login option:checked {
    background-color: #3498db;
    color: #fff;
}

.form-control-login option {
    background-color: #fff;
    color: #333;
}
</style>

<body>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">
                            <h1>View Details</h1>
                        </li>

                    </ol>
                    <div class="pcoded-inner-content">
                        <div class="main-body">
                            <div class="page-wrapper">
                                <div class="page-body">
                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="container-interment">
                                                <div class="formbold-main">
                                                    <div class="">

                                                        <h3>


                                                        </h3>
                                                        <button class="btn btn-danger" type="button" name="submit"
                                                            onclick="goBack()">Back</button>
                                                        <p>

                                                            <input type="hidden" name="profid" id="profID"
                                                                value="<?php echo $profID ?>" required="required"
                                                                class="formbold-form-input" readonly />

                                                            <input type="hidden" name="nid" id="name"
                                                                value="<?php echo $nid ?>" required="required"
                                                                class="formbold-form-input" readonly />

                                                        <div class="formbold-mb-5 w-full  formbold-px-3">
                                                            <label for="name" class="formbold-form-label"></label>
                                                            Name
                                                            </label>
                                                            <input type="text" name="name" id="name"
                                                                value="<?php echo $name ?>" required="required"
                                                                class="formbold-form-input" readonly />
                                                        </div>

                                                        <div class="formbold-mb-5 w-full  formbold-px-3">
                                                            <label for="date" class="formbold-form-label">
                                                                Date of Death </label>
                                                            <input type="text" name="DateofDeath" id="ddate"
                                                                value="<?php echo date('F j, Y', strtotime($deathdate)); ?>"
                                                                required class="formbold-form-input" readonly />
                                                        </div>

                                                        <div class="formbold-mb-5 w-full  formbold-px-3">
                                                            <label for="name" class="formbold-form-label">Cause of
                                                                Death
                                                            </label>
                                                            <input type="text" name="CauseofDeath" id="name"
                                                                value="<?php echo $causeofdeath ?>" required
                                                                class="formbold-form-input" readonly />
                                                        </div>

                                                        <div class="formbold-mb-5 w-full  formbold-px-3">
                                                            <label for="name" class="formbold-form-label">Interment
                                                                Place
                                                            </label>
                                                            <input type="text" name="IntermentPlace" id="name"
                                                                value="<?php echo $intermentplace ?>" required
                                                                class="formbold-form-input" readonly />
                                                        </div>

                                                        <div class="formbold-mb-5 w-full formbold-px-3">
                                                            <?php
                                                                $selectNno = "SELECT  * FROM tblNiche 
                                                                INNER JOIN tblNicheLocation ON tblNiche.LocID = tblNicheLocation.LocID WHERE tblNiche.Status = 0 ORDER BY Nno ASC";
                                                                $queryNno = $conn->query($selectNno);
                                                                $nnoData = array();
                                                                while($dataNno = $queryNno->fetch_assoc()){
                                                                    $nnoData[$dataNno['Nno']] = array(
                                                                        'LocID' => $dataNno['LocID'],
                                                                        'Nid' => $dataNno['Nid'],
                                                                        'Description' => $dataNno['Description'],
                                                                        'Type' => $dataNno['Type'],
                                                                        'Level' => $dataNno['Level'],
                                                                        'NLName' => $dataNno['NLName'],
                                                                    );
                                                                }
                                                            ?>
                                                            <label class="formbold-form-label"
                                                                for="form8Example3">Niches<span
                                                                    style="color:red; font-size: 8px;">*Select new niche
                                                                    (Optional)</span></label>
                                                            <select class="form-control-login" name="nno" id="nno"
                                                                onchange="updateDetailsOnChange(this)">
                                                                <?php if (!empty($Nno)): ?>
                                                                <option value="<?php echo $Nno ?>" selected disabled>
                                                                    <?php echo 'Niche: ' . $Nno.', Location: '.$nl.', Type: '.$type.', Level: '.$level.', Description: '.$des?>
                                                                </option>
                                                                <?php endif; ?>
                                                                <?php foreach ($nnoData as $niches => $details): ?>
                                                                <?php if ($niches != $Nno && $niches != $nicheno): ?>
                                                                <option value="<?php echo $niches ?>"
                                                                    data-locid="<?php echo $details['LocID'] ?>"
                                                                    data-nid="<?php echo $details['Nid'] ?>">
                                                                    <?php echo 'Niche: ' . $niches.', Location: '.$details['NLName'].', Type: '.$details['Type'].', Level: '.$details['Level'].', Description: '.$details['Description']?>
                                                                </option>
                                                                <?php endif; ?>
                                                                <?php endforeach; ?>
                                                            </select>

                                                            <input type="hidden" name="locid" id="locid"
                                                                value="<?php echo $locID ?>">
                                                            <input type="hidden" name="nid" id="nid"
                                                                value="<?php echo $nid ?>">

                                                            <input type="hidden" name="profid" id="appID"
                                                                value="<?php echo $appID ?>" required="required"
                                                                class="formbold-form-input" readonly />
                                                        </div>


                                                        <div class="row">
                                                            <div class="col-sm">
                                                                <button class="formbold-btn-next" name="next"
                                                                    onclick="pay('<?php echo $profID ?>', '<?php echo $nid ?>')">Special
                                                                    Burial</button>
                                                            </div>
                                                            <div class="col-sm">
                                                                <button class="formbold-btn-next" name="next"
                                                                    onclick="norm('<?php echo $profID ?>', '<?php echo $nid ?>')">Regular
                                                                    Burial</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
    function updateDetailsOnChange(select) {
        var selectedOption = select.options[select.selectedIndex];
        var locIdInput = document.getElementById('locid');
        var nidInput = document.getElementById('nid');
        var selectedAppID = document.getElementById('appID').value;
        var selectedProfID = document.getElementById('profID').value;

        var selectedNno = selectedOption.value;
        var selectedLocId = selectedOption.getAttribute('data-locid');
        var selectedNid = selectedOption.getAttribute('data-nid');
        var currentNid = nidInput.value;

        locIdInput.value = selectedLocId;
        nidInput.value = selectedNid;

        Swal.fire({
            title: 'Confirmation',
            text: 'Are you sure you want to update to Niche ' + selectedNno + '?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Yes, update it!',
            cancelButtonText: 'Cancel',
        }).then((result) => {
            if (result.isConfirmed) {
                updateDetails(selectedNno, selectedLocId, currentNid, selectedNid, selectedAppID,
                    selectedProfID);
            } else {
                select.value = selectedNno;
                location.reload();
            }
        });
    }

    function updateDetails(selectedNno, selectedLocId, nid, selectedNid, selectedAppID, selectedprofID) {
        fetch('../dbConn/updateNno.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'selectedNno=' + encodeURIComponent(selectedNno) +
                    '&selectedLocId=' + encodeURIComponent(selectedLocId) +
                    '&nid=' + encodeURIComponent(nid) +
                    '&selectedNid=' + encodeURIComponent(selectedNid) +
                    '&appointmentID=' + encodeURIComponent(selectedAppID) +
                    '&profileID=' + encodeURIComponent(selectedprofID),
            }).then(response => response.json())
            .then(data => {
                // Handle the response
                if (data.status === 'success') {
                    // Show success alert
                    Swal.fire({
                        title: 'Success',
                        text: data.message,
                        icon: 'success',
                    });
                } else {
                    console.error('Error:', data.message);
                }
            })
            .catch(error => {
                console.error('Fetch Error:', error);
            });
    }


    function goBack() {
        window.history.back();
    }

<<<<<<< HEAD
    function pay(id, nicheno) {
        var url = 'scheds.php?profid=' + id;
        window.location.href = url;
    }

    function norm(id, nicheno) {
        var url = 'schedss.php?profid=' + id;
=======
<<<<<<< HEAD
    function pay(id, nicheno) {
        var url = 'orderpayment.php?profid=' + id + '&nid=' + nicheno;
=======
<<<<<<< HEAD
    function pay(id, nicheno) {
        var url = 'orderpayment.php?profid=' + id + '&nid=' + nicheno;
=======
    function pay(id, nid) {
        var url = 'orderpayment.php?profid=' + id + '&nid=' + nid;
>>>>>>> b72c3c4ba43fb1f2e4ade966189cf6b3d95c1687
>>>>>>> c9be5642966b076214c66ae87a16a96449635e9f
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
        window.location.href = url;
    }
    </script>
    <?php
    require('assets/component/script.php');
    ?>

    <style>
    .add-appointment {
        box-shadow: 0px 10px 14px -7px #276873;
        background: linear-gradient(to bottom, #4169e1 5%, #408c99 100%);
        background-color: #4169e1;
        border-radius: 8px;
        display: inline-block;
        cursor: pointer;
        color: #ffffff;
        font-family: Courier New;
        font-size: 20px;
        font-weight: bold;
        padding: 13px 32px;
        text-decoration: none;
        text-shadow: 0px 1px 0px #3d768a;
    }

    .add-appointment:hover {
        background: linear-gradient(to bottom, #4169e1 5%, #599bb3 100%);
        background-color: #4169e1;
    }

    .add-appointment:active {
        position: relative;
        top: 1px;
    }
    </style>
</body>

</html>