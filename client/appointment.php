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

                                                            <form action="../dbConn/interment.php" method="POST">
                                                                <div class="formbold-mb-5">
                                                                    <label for="name"
                                                                        class="formbold-form-label">Relationship to the
                                                                        Deceased 
                                                                    </label>
                                                                    <input type="text" name="relationship" id="name"
                                                                        placeholder="e.g Daughter" required="required"
                                                                        class="formbold-form-input" />
                                                                </div>
                                                                <div class="flex flex-wrap formbold--mx-3">
                                                                    <div class="w-full sm:w-half formbold-px-3">
                                                                        <div class="formbold-mb-5">
                                                                            <label class="formbold-form-label  ">
                                                                                Address Details
                                                                            </label>
                                                                        </div>
                                                                        <div class="formbold-mb-5 flex ">

                                                                            <div class="formbold-mb-5 ">
                                                                                <div class="select">
                                                                                    <select name="barangay"
                                                                                        id="barangay">
                                                                                        <option selected disabled>Choose
                                                                                            your Barangay
                                                                                        </option>
                                                                                        <option value="b1">Apopong
                                                                                        </option>
                                                                                        <option value="b2">Baluan
                                                                                        </option>
                                                                                        <option value="b3">Batomelong
                                                                                        </option>
                                                                                        <option value="b4">Buayan
                                                                                        </option>
                                                                                        <option value="b5">Bula</option>
                                                                                        <option value="b6">Calumpang
                                                                                        </option>
                                                                                        <option value="b7">City Heights
                                                                                        </option>
                                                                                        <option value="b8">Conel
                                                                                        </option>
                                                                                        <option value="b9">Dadiangas
                                                                                            East</option>
                                                                                        <option value="b10">Dadiangas
                                                                                            North</option>
                                                                                        <option value="b11">Dadiangas
                                                                                            South</option>
                                                                                        <option value="b12">Dadiangas
                                                                                            West</option>
                                                                                        <option value="b13">Fatima
                                                                                        </option>
                                                                                        <option value="b14">Katangawan
                                                                                        </option>
                                                                                        <option value="b15">Labangal
                                                                                        </option>
                                                                                        <option value="b16">Lagao
                                                                                        </option>
                                                                                        <option value="b17">Ligaya
                                                                                        </option>
                                                                                        <option value="b18">Mabuhay
                                                                                        </option>
                                                                                        <option value="b19">Olympog
                                                                                        </option>
                                                                                        <option value="b20">San Isidro
                                                                                        </option>
                                                                                        <option value="b21">San Jose
                                                                                        </option>
                                                                                        <option value="b22">Siguel
                                                                                        </option>
                                                                                        <option value="b23">Sinawal
                                                                                        </option>
                                                                                        <option value="b24">Tambler
                                                                                        </option>
                                                                                        <option value="b25">Tinagacan
                                                                                        </option>
                                                                                        <option value="b26">Uper Labay
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="formbold-mb-5  formbold-px-3">
                                                                                <div class="select">
                                                                                    <select name="purok" id="purok">
                                                                                        <option selected disabled>Choose
                                                                                            Purok</option>
                                                                                        <option value="prk1">Prk 1
                                                                                        </option>
                                                                                        <option value="prk2">Prk 2
                                                                                        </option>
                                                                                        <option value="prk3">Prk 3
                                                                                        </option>
                                                                                        <option value="prk4">Prk 4
                                                                                        </option>
                                                                                        <option value="prk5">Prk 5
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
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
                                                                    <label for="name" class="formbold-form-label"> Age
                                                                    </label>
                                                                    <input type="text" name="age" id="name"
                                                                        placeholder="Enter Age" required="required"
                                                                        class="formbold-form-input" />
                                                                </div>
                                                                <div class="formbold-mb-5">
                                                                    <label for="date" class="formbold-form-label">
                                                                    Date of Death </label>
                                                                    <input type="date" name="deathdate" id="ddate"
                                                                        required="required"
                                                                        class="formbold-form-input" />
                                                                </div>
                                                                <hr>
                                                                <!-- <label
                                                                    class="formbold-form-label formbold-form-label-2">
                                                                    Select Desired Date
                                                                </label>
                                                                <div class="formbold-mb-5 flex  ">
                                                                    <div class="formbold-mb-5 w-full  ">
                                                                        <label for="date" class="formbold-form-label">
                                                                            Date </label>
                                                                        <input type="date" name="ddate" id="ddate"
                                                                            required="required"
                                                                            class="formbold-form-input" />
                                                                    </div>
                                                                    <div class="formbold-mb-5 w-full  formbold-px-3">
                                                                        <label for="time" class="formbold-form-label">
                                                                            Time </label>
                                                                        <input type="time" name="time" id="time"
                                                                            required="required"
                                                                            class="formbold-form-input" />
                                                                    </div>
                                                                </div> -->
                                                                <?php
                                                                if ($_SESSION['id']) {
                                                                    $user_id = $_SESSION['id'];
                                                                    $select = "SELECT * FROM users WHERE id = $user_id";
                                                                    $query = mysqli_query($conn, $select);
                                                                    while ($data = mysqli_fetch_assoc($query)) {
                                                                        $id = $data['id'];
                                                                        $name = $data['firstname'] . ' ' . $data['midname'] . ' ' . $data['lastname'];
                                                                        $role = $data['role'];
                                                                    }
                                                                }
                                                                ?>
                                                                <div class="formbold-mb-5 w-full  formbold-px-3"
                                                                    style="display: none;">
                                                                    <label for="time" class="formbold-form-label">
                                                                    </label>
                                                                    <input type="text" name="user_id" id="user_id"
                                                                        required class="formbold-form-input"
                                                                        value="<?php echo $id ?>" />
                                                                </div>
                                                                <div class="formbold-mb-5 w-full  formbold-px-3"
                                                                    style="display: none;">
                                                                    <label for="time" class="formbold-form-label">
                                                                    </label>
                                                                    <input type="text" name="user_name" id="user_name"
                                                                        required class="formbold-form-input"
                                                                        value="<?php echo $name ?>" />
                                                                </div>
                                                                <div class="formbold-mb-5 w-full  formbold-px-3"
                                                                    style="display: none;">
                                                                    <label for="time" class="formbold-form-label">
                                                                    </label>
                                                                    <input type="text" name="role" id="user_name"
                                                                        required class="formbold-form-input"
                                                                        value="<?php echo $role ?>" />
                                                                </div>

                                                                <div>
                                                                    <button class="formbold-btn-next" name="next"
                                                                        >Next</button>
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