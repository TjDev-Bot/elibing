<!DOCTYPE html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
<link href="assets/css/table.css" rel="stylesheet" />
<link rel="stylesheet" href="assets/css/walkin.css">

<?php
include('../dbConn/conn.php');
require_once('component/header.php');

if (isset($_GET['locid']) && isset($_GET['nid']) && isset($_GET['profid']) && isset($_GET['level'])) {
    $block_id = $_GET['locid'];
    $nid = $_GET['nid'];
    $profId = $_GET['profid'];
    $level = $_GET['level'];

    $select = "SELECT * FROM tblDeathRecord WHERE ProfileID = '$profId'";
    $query = $conn->query($select);

    while ($occupant = $query->fetch(PDO::FETCH_ASSOC)) {
    
        // $id = $occupant['occupant_id'];
        $name = $occupant['Fname'] . ' ' . $occupant['MName'] . ' ' . $occupant['Lname'] . ' ' .  $occupant['Suffix'];
        $dateofdeath = $occupant['DateofDeath'];
        $causeofdeath = $occupant['CauseofDeath'];
        $intermentplace = $occupant['IntermentPlace'];

        $intermentdatetime = date('F j, Y g:i A', strtotime($occupant['IntermentDateTime']));


    }
}
?>


<body>

    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-container navbar-wrapper">
            <!-- Top Nav Bar-->
            <?php require_once('component/topnavbar.php'); ?>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <!-- Sidebar -->
                    <?php require_once('component/sidebar.php'); ?>
                    <div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Dashboard</h5>
                                            <p class="m-b-0">Welcome to Appointment</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="index.php"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-sm">
                                                <div class="container-interment">
                                                    <div class="formbold-main">
                                                        <div class="">
                                                            <button class="btn btn-danger" type="button" name="submit"
                                                                onclick="goBack('<?php echo $block_id ?>' , '<?php echo $nid ?>', '<?php echo $profId ?>', '<?php echo $level ?>')">Back</button>
                                                            <p>

                                                            <div class="formbold-mb-5 w-full  formbold-px-3">
                                                                <label for="name" class="formbold-form-label"></label>
                                                                Name
                                                                </label>
                                                                <input type="text" name="Lname" id="name"
                                                                    value="<?php echo $name ?>" required="required"
                                                                    class="formbold-form-input" readonly />
                                                            </div>

                                                            <div class="formbold-mb-5 w-full  formbold-px-3">
                                                                <label for="date" class="formbold-form-label">
                                                                    Date of Death </label>
                                                                <input type="date" name="DateofDeath" id="ddate"
                                                                    value="<?php echo $dateofdeath ?>" required
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

                                                            <div class="formbold-mb-5 w-full  formbold-px-3">
                                                                <label for="date" class="formbold-form-label">
                                                                    Interment Date</label>
                                                                <input type="text" name="IntermentDate" id="ddate"
                                                                    value="<?php echo $intermentdatetime; ?>" required
                                                                    class="formbold-form-input" readonly />

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
                <div id="styleSelector"> </div>
            </div>
        </div>
    </div>

    <script>
    function goBack(block_id, nicheno, profid, level) {
        var url = 'clientoccupant.php?locid=' + block_id + '&nid=' + nicheno + '&profid=' + profid + '&level=' + level;
        window.location.href = url;
    }
    </script>
    <!-- Required Jquery -->
    <script type="text/javascript" src="assets/js/jquery/jquery.min.js "></script>
    <script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js "></script>
    <script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js "></script>
    <!-- waves js -->
    <script src="assets/pages/waves/js/waves.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- slimscroll js -->
    <script src="assets/js/jquery.mCustomScrollbar.concat.min.js "></script>

    <!-- menu js -->
    <script src="assets/js/pcoded.min.js"></script>
    <script src="assets/js/vertical/vertical-layout.min.js "></script>
    <script type="text/javascript" src="assets/js/script.js "></script>

</body>

</html>