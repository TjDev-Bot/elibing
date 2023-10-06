<!DOCTYPE html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
</script>
<?php
include('../dbConn/conn.php');
require_once('component/header.php');
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
                                            <p class="m-b-0">Welcome to Renewal</p>
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

                                                            <form action="../dbConn/renew.php" method="POST">
                                                                <div class="formbold-mb-5">
                                                                    <label for="name"
                                                                        class="formbold-form-label">Relationship
                                                                        to the
                                                                        Deceased
                                                                    </label>
                                                                    <input type="text" name="relationship" id="name"
                                                                        placeholder="e.g Daughter" required="required"
                                                                        class="formbold-form-input" />
                                                                </div>
                                                                <div class="formbold-mb-5">
                                                                    <label for="name" class="formbold-form-label"> Name
                                                                        of the Deceased
                                                                    </label>
                                                                    <input type="text" name="deceased" id="name"
                                                                        placeholder="Enter Full Name"
                                                                        required="required"
                                                                        class="formbold-form-input" />
                                                                </div>

                                                                <div class="formbold-mb-5">
                                                                    <label for="date" class="formbold-form-label">
                                                                        Date of Death </label>
                                                                    <input type="date" name="deathdate" id="ddate"
                                                                        required="required"
                                                                        class="formbold-form-input" />
                                                                </div>

                                                                <div class="formbold-mb-5">
                                                                    <label for="date" class="formbold-form-label">
                                                                        Date of Interment </label>
                                                                    <input type="date" name="interment" id="ddate"
                                                                        required="required"
                                                                        class="formbold-form-input" />
                                                                </div>
                                                                <label for="name" class="formbold-form-label"> Month
                                                                </label>
                                                                <select name="month" id="" required>
                                                                    <option value="" select disable hidden>Select Month
                                                                        Duration</option>
                                                                    <option value="1">1 month</option>
                                                                    <option value="2">2 months</option>
                                                                    <option value="3">3 months</option>
                                                                    <option value="4">4 months</option>
                                                                    <option value="5">5 months</option>
                                                                    <option value="6">6 months</option>
                                                                    <option value="7">7 months</option>
                                                                    <option value="8">8 months</option>
                                                                    <option value="9">9 months</option>
                                                                    <option value="10">10 months</option>
                                                                    <option value="11">11 months</option>
                                                                    <option value="12">12 months</option>
                                                                </select>
                                                        </div>
                                                        <hr>


                                                        <div>
                                                            <button class="formbold-btn-next" name="next"
                                                                data-bs-target="#exampleModal">Next</button>
                                                        </div>
                                                        </form>
                                                        <!--<div>
                                                                <button class="formbold-btn-next" name="next"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#exampleModal">Next</button>
                                                            </div>-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Page-body end -->
                                <!-- Payment Method Modal
                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">We Accept
                                                        E-Wallet Payments</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container-payment-method">
                                                        <div class="accept col-50">
                                                            <div class="icon-container">
                                                                <span class="icon-container">
                                                                    <div class="gcash">
                                                                        <img width="90" height="45"
                                                                            src="https://orangemagazine.ph/wp-content/uploads/2022/05/GCASH-Logo.png"
                                                                            alt="gcash" />
                                                                    </div>
                                                                    <div class="paymaya">
                                                                        <img width="55" height="50"
                                                                            src="https://play-lh.googleusercontent.com/MYVxoAAKgx1buBB-jn-U1wb8iUguAKwWH6EtfdT6l-zA_xqw2bxbHvycs25RXt9NZR4"
                                                                            alt="maya" />
                                                                    </div>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-cancel"
                                                        data-bs-dismiss="modal">Cancel </button>
                                                    <button type="button" class="btn btn-primary">Proceed</button> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="styleSelector"> </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>


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