<!DOCTYPE html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
<link href="assets/css/table.css" rel="stylesheet" />

<?php
include('../dbConn/conn.php');
require_once('component/header.php');
if(isset($_GET['profid'])){
    $profid = $_GET['profid'];
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
                                                            <div
                                                                class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                                                <div class="container">


                                                                    <div class="activity-log-container">
                                                                        <div class="activity-log-container-scroll">
                                                                            <table class="table-no-border">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Block No</th>
                                                                                        <th>NL Name</th>
                                                                                        <th>Size</th>
                                                                                        <th>Description</th>
                                                                                        <th>Type</th>
                                                                                        <th>Action</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>

                                                                                    <?php
                                               
                                                                                        $select = "SELECT * FROM tblNicheLocation";
                                                                                        $query = $conn->query($select);

                                                                                        while($data = $query->fetch(PDO::FETCH_ASSOC)){
                                                                                            $id = $data['LocID'];
                                                                                            $nlname = $data['NLName'];
                                                                                            $size = $data['Size'];
                                                                                            $description = $data['Description'];
                                                                                            $type = $data['Type'];
                                                                                    ?>
                                                                                    <tr>
                                                                                        <td><?php echo $id ?></td>
                                                                                        <td><?php echo $nlname ?></td>
                                                                                        <td><?php echo $size ?></td>
                                                                                        <td><?php echo $description?>
                                                                                        </td>
                                                                                        <td><?php echo $type ?></td>
                                                                                        <td>
                                                                                            <button
                                                                                                class="btn btn-primary"
                                                                                                onclick="addNiche('<?php echo $profid; ?>', '<?php echo $id; ?>')">
                                                                                                <i
                                                                                                    class='bx bx-edit-alt'></i>
                                                                                            </button>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <?php } ?>
                                                                                </tbody>
                                                                            </table>

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
                        </div>
                    </div>
                </div>
                <div id="styleSelector"> </div>
            </div>
        </div>
    </div>

    <script>
    function addNiche(profid, id) {
        var url = 'clientniche.php?profid=' + profid + '&locid=' + id;
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