<!DOCTYPE html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
<link href="assets/css/table.css" rel="stylesheet" />

<?php
include('../dbConn/conn.php');
require_once('component/header.php');

if (isset($_GET['locid']) && isset($_GET['profid'])) {
    $block_id = $_GET['locid'];
    $profid = $_GET['profid'];
    $select = "SELECT * FROM tblNicheLocation WHERE LocID = $block_id";
    // $query = mysqli_query($conn, $select);

    // while ($data = mysqli_fetch_assoc($query)) {
    //     $id = $data['block_id'];
    // }
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
                                                <button class="btn btn-danger mb-2" type="button" name="submit"
                                                    onclick="goBack('<?php echo $block_id ?>', '<?php echo $profid ?>')">Back</button>
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
                                                                                        <th style="display: none;">Niche
                                                                                            ID</th>
                                                                                        <th>Niche No</th>
                                                                                        <th>Level</th>
                                                                                        <th>Size</th>
                                                                                        <th>Status</th>
                                                                                        <th>Action</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>

                                                                                    <?php
                                                                                    $selectloc = "SELECT * FROM tblNiche WHERE LocID = '$block_id' ORDER BY Nno ASC";
                                                                                    $queryloc = $conn->query($selectloc);
                                                                                    while ($dataloc = $queryloc->fetch(PDO::FETCH_ASSOC)) {
                                                                                        // $location_id = $dataloc['location_id'];
                                                                                        $nicheid = $dataloc['Nid'];
                                                                                        $level = $dataloc['Level'];
                                                                                        $status = $dataloc['Status'];
                                                                                        $nno = $dataloc['Nno'];
                                                                                        $size = $dataloc['Size'];

                                                                                        if($status == 0){
                                                                                            $statustoString = "Unoccupied";
                                                                                        }else if($status == 1){
                                                                                            $statustoString = "Reserved";
                                                                                        } else {
                                                                                            $statustoString = "Occupied";
                                                                                        }
                                                                                        
                                                                                        if($status == 0){

                                                                                      
                                                                                    ?>
                                                                                    <tr>

                                                                                        <td style="display: none;">
                                                                                            <?php echo $nicheid?></td>
                                                                                        <td><?php echo $nno ?></td>
                                                                                        <td><?php echo $level ?></td>
                                                                                        <td><?php echo $size ?></td>
                                                                                        <td><?php echo $statustoString ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <button
                                                                                                class="btn btn-primary "
                                                                                                onclick="addOcuppant('<?php echo $block_id; ?>', '<?php echo $nicheid; ?>' , '<?php echo $profid; ?>')">
                                                                                                <i
                                                                                                    class='bx bx-edit-alt'></i>
                                                                                            </button>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <?php } }?>
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
    function goBack(profid) {
        var url = 'block.php?profid=' + profid;
        window.location.href = url;
    }

    function addOcuppant(block_id, nicheid, profid) {
        var url = 'clientoccupant.php?locid=' + block_id + '&nid=' + nicheid + '&profid=' + profid;
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