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
    while ($dataloc = $queryreserve->fetch(PDO::FETCH_ASSOC)) {
        // $appointmentID = $dataloc['AppointmentID'];
        $relationship = $dataloc['Relationship'];
        $locID = $dataloc['LocID'];
        $nicheno = $dataloc['Nid'];
        $profID = $dataloc['ProfID'];
        $name = $dataloc['Fname'].' '.$dataloc['MName'].' '.$dataloc['Lname'];
        $status = $dataloc['Status'];
        $deathdate = $dataloc['DateofDeath'];
        $causeofdeath = $dataloc['CauseofDeath'];
        $intermentplace = $dataloc['IntermentPlace'];

    }
}
?>



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

                                                            <input type="hidden" name="profid" id="name"
                                                                value="<?php echo $profID ?>" required="required"
                                                                class="formbold-form-input" readonly />

                                                            <input type="hidden" name="nid" id="name"
                                                                value="<?php echo $nicheno ?>" required="required"
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
                                                                    value="<?php echo $deathdate ?>" required
                                                                    class="formbold-form-input" readonly />
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

                                                            <div>
                                                                <button class="formbold-btn-next" name="next"
                                                                    onclick="pay('<?php echo $profID ?>', '<?php echo $nicheno ?>')">Proceed</button>
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

    <script>
    function goBack() {
        window.history.back();
    }

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