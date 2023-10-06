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

if(isset($_GET['id']) && isset($_GET['name'])){
    $user_id = $_GET['id'];
    $name = $_GET['name'];
    // Debugging statements
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
                                            <p class="m-b-0">Welcome to Order Payment</p>
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
                                                        <form action="" method="post">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="">
                                                                        <?php 
                                                                        $select = "SELECT * FROM prices";
                                                                        $query = mysqli_query($conn, $select);
                                                                        while($data = mysqli_fetch_assoc($query)){
                                                                            $apartmentniche = $data['apartmentniche'];
                                                                            $floatingniche1stuser = $data['floatingniche1stuser'];
                                                                            $floatingniche2nduser = $data['floatingniche2nduser'];
                                                                            $below18 = $data['18andbelow'];
                                                                            $age0 = $data['0age'];
                                                                            $bonechamber = $data['bonechamber'];
                                                                            $mausoleum = $data['mausoleum'];
                                                                            $mausdownpayment = $data['mausdownpayment'];
                                                                            $mausamortization = $data['mausamortization'];
                                                                            $exhupermitfee = $data['exhupermitfee'];
                                                                            $exhufee = $data['exhufee'];
                                                                            $burialfee = $data['burialfee'];
                                                                            $deathcertificate = $data['deathcertificate'];
                                                                        }

                                                                        $selectinter = "SELECT * FROM intermentform WHERE user_id = $user_id";
                                                                        $queryinter = mysqli_query($conn, $selectinter);
                                                                        while($datainter = mysqli_fetch_assoc($queryinter)){
                                                                            $age = $datainter['age'];
                                                                            
                                                                            if($age >= 1 && $age <= 18){
                                                                                $age0ContainerStyle = 'display: none;'; 
                                                                                $below18ContainerStyle = ''; 
                                                                            } else if($age <= 0 ){
                                                                                $age0ContainerStyle = ''; 
                                                                                $below18ContainerStyle = 'display: none;';
                                                                            } else {
                                                                                $age0ContainerStyle = 'display: none;';
                                                                                $below18ContainerStyle = 'display: none;'; 
                                                                            }
                                                                        }                                                                    


                                                                    ?>
                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <label for="">Apartment Type
                                                                                    Niche</label>
                                                                                <label
                                                                                    for=""><?php echo $user_id ?></label>
                                                                            </div>
                                                                            <div class="col">
                                                                            ₱
                                                                                <input type="text" id="apartmentniche"
                                                                                    value="<?php echo number_format($apartmentniche, 2) ?>"
                                                                                    select disabled>

                                                                            </div>
                                                                        </div>




                                                                        <label for="floatingNiche">Floating
                                                                            Niche</label>
                                                                        <div>
                                                                            <div class="row">
                                                                                <div class="col">
                                                                                    <label for="b1">b1. 1st User</label>


                                                                                </div>
                                                                                <div class="col">
                                                                                    <input type="radio" id="b1"
                                                                                        name="floatingNiche"
                                                                                        value=" <?php echo $floatingniche1stuser ?>">
                                                                                        ₱
                                                                                    <?php echo number_format($floatingniche1stuser, 2) ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div>
                                                                            <div class="row">
                                                                                <div class="col">
                                                                                    <label for="b2">b2. 2nd User</label>

                                                                                </div>
                                                                                <div class="col">
                                                                                    <input type="radio" id="b2"
                                                                                        name="floatingNiche"
                                                                                        value=" <?php echo $floatingniche2nduser ?>">
                                                                                        ₱
                                                                                    <?php echo number_format($floatingniche2nduser, 2) ?>
                                                                                </div>
                                                                            </div>

                                                                        </div>

                                                                        <br>
                                                                        <div class="row"
                                                                            style="<?php echo $below18ContainerStyle ?>">
                                                                            <div class="col">
                                                                                <label for="">Child Burial (18 and
                                                                                    Below)</label>
                                                                            </div>
                                                                            <div class="col">
                                                                            ₱
                                                                                <input type="text" id="below18"
                                                                                    value="<?php echo number_format($below18, 2) ?>"
                                                                                    select disabled>

                                                                            </div>
                                                                        </div>

                                                                        <div class="row"
                                                                            style="<?php echo $age0ContainerStyle ?>">
                                                                            <div class="col">
                                                                                <label for="">Child Burial (0 age -
                                                                                    vault)</label>
                                                                            </div>
                                                                            <div class="col">
                                                                            ₱
                                                                                <input type="text"
                                                                                    value="<?php echo number_format($age0, 2) ?>" select
                                                                                    disabled>

                                                                            </div>
                                                                        </div>



                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <label for="">Individual Bone Chamber
                                                                                    (Aperment
                                                                                    Vault)</label>

                                                                            </div>
                                                                            <div class="col">
                                                                                ₱
                                                                                <input type="text"
                                                                                    value="<?php echo number_format($bonechamber, 2) ?>"
                                                                                    select disabled>

                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                        <div>
                                                                            <div class="row">
                                                                                <div class="col">
                                                                                    <label for="">Mausoleum Fully
                                                                                        Paid</label>


                                                                                </div>
                                                                                <div class="col">
                                                                                    <input type="radio" id="" name="mau"
                                                                                        value=" <?php echo $mausoleum ?>">
                                                                                    ₱
                                                                                    <?php echo number_format($mausoleum, 2) ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div>
                                                                            <div class="row">
                                                                                <div class="col">
                                                                                    <label for="">d1. 30%
                                                                                        Downpayment</label>


                                                                                </div>
                                                                                <div class="col">
                                                                                    <input type="radio" id="" name="mau"
                                                                                        value=" <?php echo $mausdownpayment ?>">
                                                                                    ₱
                                                                                    <?php echo number_format($mausdownpayment, 2) ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div>
                                                                            <div class="row">
                                                                                <div class="col">
                                                                                    <label for="">d2. 24 months
                                                                                        Amortization</label>

                                                                                </div>
                                                                                <div class="col">
                                                                                    <input type="radio" id="" name="mau"
                                                                                        value="<?php echo $mausamortization?> ">
                                                                                    ₱
                                                                                    <?php echo number_format($mausamortization, 2)?>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <br>

                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <label for="">Exhumation Permit
                                                                                    Fee</label>

                                                                            </div>
                                                                            <div class="col">
                                                                                ₱
                                                                                <input type="text"
                                                                                    value="<?php echo number_format($exhupermitfee, 2) ?>"
                                                                                    select disabled>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <label for="">Exhumation Fee</label>
                                                                            </div>
                                                                            <div class="col">
                                                                                ₱
                                                                                <input type="text"
                                                                                    value="<?php echo number_format($exhufee, 2) ?>"
                                                                                    select disabled>

                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <label for="">Burial Fee</label>

                                                                            </div>
                                                                            <div class="col">
                                                                                ₱
                                                                                <input type="text"
                                                                                    value="<?php echo number_format($burialfee, 2)?>"
                                                                                    select disabled>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <label for="">Certified Photocopy Death
                                                                                    Certificate</label>


                                                                            </div>
                                                                            <div class="col">
                                                                                ₱
                                                                                <input type="text"
                                                                                    value="<?php echo number_format($deathcertificate, 2)?>"
                                                                                    select disabled>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>



                                                                <div class="col">

                                                                    <div id="totalSection">
                                                                        <h4>Total Amount:</h4>
                                                                        ₱
                                                                        <input type="text" id="totalAmount"
                                                                            value="<?php echo number_format($totalamount, 2, '.', ',') ?>">
                                                                    </div>

                                                                </div>
                                                            </div>
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
                <div id="styleSelector"> </div>
            </div>
        </div>
    </div>

    <script>
    function calculateTotal() {
        var totalAmount = 0;

        var age = parseFloat(<?php echo $age; ?>);
        if (age >= 1 && age <= 18) {
            totalAmount += parseFloat(<?php echo $age0; ?>);
        } else if (age <= 0) {
            totalAmount += parseFloat(<?php echo $below18; ?>);
        }
        var selectedFloatingNiche = document.querySelector('input[name="floatingNiche"]:checked');
        if (selectedFloatingNiche) {
            var floatingNicheValue = parseFloat(selectedFloatingNiche.value);
            totalAmount += floatingNicheValue;
        }

        // Calculate total based on selected mausoleum option
        var selectedMausoleum = document.querySelector('input[name="mau"]:checked');
        if (selectedMausoleum) {
            var mausoleumValue = parseFloat(selectedMausoleum.value);
            totalAmount += mausoleumValue;
        }

        // Calculate total for other fields
        totalAmount += parseFloat(<?php echo $apartmentniche; ?>);
        totalAmount += parseFloat(<?php echo $bonechamber; ?>);
        totalAmount += parseFloat(<?php echo $exhupermitfee; ?>);
        totalAmount += parseFloat(<?php echo $exhufee; ?>);
        totalAmount += parseFloat(<?php echo $burialfee; ?>);
        totalAmount += parseFloat(<?php echo $deathcertificate; ?>);

        // Update the total amount input field
        document.getElementById('totalAmount').value = totalAmount.toFixed(2);
    }

    // Attach change event listeners to relevant form elements
    var floatingNicheRadios = document.querySelectorAll('input[name="floatingNiche"]');
    var mausRadios = document.querySelectorAll('input[name="mau"]');

    floatingNicheRadios.forEach(function(radio) {
        radio.addEventListener('change', calculateTotal);
    });

    mausRadios.forEach(function(radio) {
        radio.addEventListener('change', calculateTotal);
    });

    // Trigger the initial calculation
    calculateTotal();
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