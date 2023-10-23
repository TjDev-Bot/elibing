<!DOCTYPE html>
<html lang="en">
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
</script> -->

<?php
include('../dbConn/conn.php');
require_once('component/header.php');
if(isset($_SESSION['id']) && isset($_SESSION['Createdby'])){
    $id = $_SESSION['id'];
    $createdby = $_SESSION['Createdby'];
}

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
                                                            <form action="../dbConn/clientoccupant.php" method="POST">
                                                                <input type="hidden" value="<?php echo $id?> ">
                                                                <input type="hidden" name="create"
                                                                    value="<?php  echo $createdby ?>">
                                                                <div class="formbold-mb-5 w-full  formbold-px-3">
                                                                    <label for="time" class="formbold-form-label">
                                                                    </label>
                                                                    <input type="hidden" name="Nid" id="user_name"
                                                                        required class="formbold-form-input"
                                                                        value="<?php echo $nicheno ?>" />
                                                                </div>

                                                                <div class="formbold-mb-5 flex">
                                                                    <div class="formbold-mb-5 w-full">
                                                                        <label for="name"
                                                                            class="formbold-form-label">
                                                                            Full Name
                                                                        </label>
                                                                        <input type="text" name="fullname" id="name"
                                                                            required class="formbold-form-input" />
                                                                    </div>
                                                                    <div class="formbold-mb-5 w-full">
                                                                        <label for="name"
                                                                            class="formbold-form-label">Relationship to
                                                                            the
                                                                            Deceased
                                                                        </label>
                                                                        <input type="text" name="relationship" id="name"
                                                                            placeholder="e.g Daughter"
                                                                            required="required"
                                                                            class="formbold-form-input" />
                                                                    </div>
                                                                </div>


                                                                <div class="formbold-mb-5 flex">
                                                                    <div class="formbold-mb-5 w-full">
                                                                        <label for="" class="formbold-form-label">
                                                                            Contact No
                                                                        </label>
                                                                        <input type="tel" name="contact" id="name"
                                                                            placeholder="Please enter a valid Philippine phone number with 63 and 10 digits."
                                                                            required class="formbold-form-input"
                                                                            pattern="^\63\d{10}$"
                                                                            title="Please enter a valid Philippine phone number with 63 and 10 digits." />
                                                                    </div>

                                                                    <div class="formbold-mb-5 w-full">
                                                                        <label for="name" class="formbold-form-label">
                                                                            Email Address
                                                                        </label>
                                                                        <input type="email" name="email" id=""
                                                                            placeholder=""
                                                                            class="formbold-form-input" />
                                                                    </div>

                                                                </div>

                                                                <hr>
                                                                <h6 class="mb-5">Deceased Information</h6>
                                                                <div class="formbold-mb-5 flex">
                                                                    <div class="formbold-mb-5 w-full  ">
                                                                        <label for="name" class="formbold-form-label">
                                                                            Last
                                                                            Name
                                                                        </label>
                                                                        <input type="text" name="Lname" id="name"
                                                                            placeholder="Enter Last Name"
                                                                            required="required"
                                                                            class="formbold-form-input" />
                                                                    </div>

                                                                    <div class="formbold-mb-5 w-full  formbold-px-3">
                                                                        <label for="name" class="formbold-form-label">
                                                                            First
                                                                            Name
                                                                        </label>
                                                                        <input type="text" name="Fname" id="name"
                                                                            placeholder="Enter First Name"
                                                                            required="required"
                                                                            class="formbold-form-input" />
                                                                    </div>

                                                                    <div class="formbold-mb-5 w-full  formbold-px-3">
                                                                        <label for="name" class="formbold-form-label">
                                                                            Middle Name
                                                                        </label>
                                                                        <input type="text" name="MName" id="name"
                                                                            placeholder="Enter Middle Name"
                                                                            required="required"
                                                                            class="formbold-form-input" />
                                                                    </div>

                                                                    <div class="formbold-mb-5 w-full  formbold-px-3">
                                                                        <label for="name" class="formbold-form-label">
                                                                            Suffix
                                                                        </label>
                                                                        <select class="w-full" name="Suffix" id="">
                                                                            <option value="" select disable>Select
                                                                                Suffix
                                                                            </option>
                                                                            <option value="Jr">Jr</option>
                                                                            <option value="Sr">Sr</option>
                                                                        </select>
                                                                        <!-- <input type="text" name="Suffix" id="name"
                                                                        placeholder="Jr / Sr"
                                                                        class="formbold-form-input" /> -->
                                                                    </div>
                                                                </div>
                                                                <div class="formbold-mb-5 flex">
                                                                    <div class="formbold-mb-5">
                                                                        <label for="date" class="formbold-form-label">
                                                                            Date of Death </label>
                                                                        <input type="date" name="DateofDeath" id="ddate"
                                                                            required class="formbold-form-input" />
                                                                    </div>

                                                                    <div class="formbold-mb-5 w-full">
                                                                        <label for="name"
                                                                            class="formbold-form-label">Cause
                                                                            of Death
                                                                        </label>
                                                                        <input type="text" name="CauseofDeath" id="name"
                                                                            placeholder="" required
                                                                            class="formbold-form-input" />
                                                                    </div>

                                                                    <div class="formbold-mb-5 w-full">
                                                                        <label for="name"
                                                                            class="formbold-form-label">Interment Place
                                                                        </label>
                                                                        <input type="text" name="IntermentPlace"
                                                                            id="name" placeholder="Enter Place" required
                                                                            class="formbold-form-input" />
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <button class="formbold-btn-next" name="next"
                                                                    data-bs-target="#exampleModal">Next</button>
                                                            </form>
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