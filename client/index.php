<!DOCTYPE html>
<html lang="en">

<?php
require_once('component/header.php');
include "../dbConn/conn.php";

?>

<body>

    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
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
                                            <p class="m-b-0">Welcome to e-Libing</p>
                                        </div>
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
                                            <div class="col-xl-6 col-md-12">
                                                <div class="card table-card">
                                                    <div class="card-header">
                                                        <h5>Reminder</h5>
                                                        <div class="card-header-right">
                                                            <ul class="list-unstyled card-option">
                                                                <li><i class="fa fa-refresh reload-card"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="table-responsive">
                                                            <table class="table table-hover m-b-0 without-header">
                                                                <tbody>
                                                                    <?php 
                                                                        if(isset($_SESSION['id'])){
                                                                            $user_id = $_SESSION['id'];
                                                                            $select = "SELECT * FROM tblNiche
                                                                            INNER JOIN tblIntermentReservation ON tblNiche.Nid = tblIntermentReservation.Nid
                                                                            INNER JOIN tblDeathRecord ON tblIntermentReservation.ProfID = tblDeathRecord.ProfileID 
                                                                            INNER JOIN tblNicheLocation ON tblNiche.LocID = tblNicheLocation.LocID
                                                                            INNER JOIN tblContactInfo ON tblDeathRecord.ProfileID = tblContactInfo.ProfID";
                                                                            $query = $conn->query($select);
                                                                            while($data = $query->fetch(PDO::FETCH_ASSOC)){
                                                                                $date = $data['IntermentDateTime'];
                                                                                $nid = $data['Nid'];
                                                                                $status = $data['Status'];
                                                                                $intermentplace = $data['IntermentPlace'];
                                                                                $id = $data['ProfID'];
                                                                            }
                                                                            if ($status == 1) {
                                                                                echo "
                                                                                <td>
                                                                                    <div class=\"d-inline-block align-middle\">
                                                                                        The schedule you selected
                                                                                    </div>
                                                                                </td>
                                                                                <td class=\"text-right\">" . date('F d, Y g:i A', strtotime($date)) . "</td>
                                                                                <td>
                                                                                    <div class=\"btn btn-info\" onclick=\"add('$nid', '$id')\">
                                                                                        Pay
                                                                                    </div>
                                                                                </td>";
                                                                            } else {
                                                                                echo "
                                                                                <td>
                                                                                    <div class=\"d-inline-block align-middle\">
                                                                                        Interment Schedule
                                                                                    </div>
                                                                                </td>
                                                                                <td class=\"text-right\">" . date('F d, Y g:i A', strtotime($date)) . "</td>
                                                                                <td class=\"text-right\">
                                                                                    At $intermentplace
                                                                                </td>";
                                                                            }                                                                            
                                                                            
                                                                        }
                                                                        
                                                                    ?>
                                                                    <tr>


                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <div class="d-inline-block align-middle">
                                                                            </div>
                                                                        </td>
                                                                        <td class="text-right">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <div class="d-inline-block align-middle">
                                                                            </div>
                                                                        </td>
                                                                        <td class="text-right">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <div class="d-inline-block align-middle">
                                                                            </div>
                                                                        </td>
                                                                        <td class="text-right">
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Page-body end -->
                                </div>
                                <div id="styleSelector"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
    .text-right {
        color: green;
    }
    </style>

    <script>
    function add(nid, id) {
        var url = 'orderpayment.php?nid=' + nid + '&profid=' + id;
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