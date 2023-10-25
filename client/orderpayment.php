<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
</script>
<?php
include('../dbConn/conn.php');
require_once('component/header.php');

if(isset($_GET['nid']) && isset($_GET['profid'])){
    $nid = $_GET['nid'];
    $profid = $_GET['profid'];
} 

if (isset($_POST['paymentButton'])) {
    $nid = $_POST['nid'];
    $profid = $_POST['id'];

    try {
        $update1 = "UPDATE tblNiche SET Status = 2 WHERE Nid = ?";
        $stmt1 = $conn->prepare($update1);
        $stmt1->execute([$nid]);

        $update2 = "UPDATE tblIntermentReservation SET Nid = ? WHERE ProfID = ?";
        $stmt2 = $conn->prepare($update2);
        $stmt2->execute([$nid, $profid]);

        if ($stmt1->rowCount() > 0) {
            // Redirect to index.php
            header("Location: index.php");
            exit();
        } else {
            echo "No records updated.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
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
                                                                        // $select = "SELECT * FROM prices";
                                                                        // $query = mysqli_query($conn, $select);
                                                                        // while($data = mysqli_fetch_assoc($query)){
                                                                        //     $apartmentniche = $data['apartmentniche'];
                                                                        //     $floatingniche1stuser = $data['floatingniche1stuser'];
                                                                        //     $floatingniche2nduser = $data['floatingniche2nduser'];
                                                                        //     $below18 = $data['18andbelow'];
                                                                        //     $age0 = $data['0age'];
                                                                        //     $bonechamber = $data['bonechamber'];
                                                                        //     $mausoleum = $data['mausoleum'];
                                                                        //     $mausdownpayment = $data['mausdownpayment'];
                                                                        //     $mausamortization = $data['mausamortization'];
                                                                        //     $exhupermitfee = $data['exhupermitfee'];
                                                                        //     $exhufee = $data['exhufee'];
                                                                        //     $burialfee = $data['burialfee'];
                                                                        //     $deathcertificate = $data['deathcertificate'];
                                                                        // }

                                                                        // $selectinter = "SELECT * FROM intermentform WHERE user_id = $user_id";
                                                                        // $queryinter = mysqli_query($conn, $selectinter);
                                                                        // while($datainter = mysqli_fetch_assoc($queryinter)){
                                                                        //     $age = $datainter['age'];
                                                                            
                                                                        //     if($age >= 1 && $age <= 18){
                                                                        //         $age0ContainerStyle = 'display: none;'; 
                                                                        //         $below18ContainerStyle = ''; 
                                                                        //     } else if($age <= 0 ){
                                                                        //         $age0ContainerStyle = ''; 
                                                                        //         $below18ContainerStyle = 'display: none;';
                                                                        //     } else {
                                                                        //         $age0ContainerStyle = 'display: none;';
                                                                        //         $below18ContainerStyle = 'display: none;'; 
                                                                        //     }
                                                                        // }                                                                    
                                                                    ?>
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <label for="">Apartment Type
                                                                                Niche</label>
                                                                            <label for=""></label>
                                                                        </div>
                                                                        <div class="col">
                                                                            ₱
                                                                            <input type="text" id="apartmentniche"
                                                                                value="" select disabled>

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
                                                                                    name="floatingNiche" value="">
                                                                                ₱

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
                                                                                    name="floatingNiche" value="">
                                                                                ₱
                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                    <br>
                                                                    <div class="row" style="">
                                                                        <div class="col">
                                                                            <label for="">Child Burial (18 and
                                                                                Below)</label>
                                                                        </div>
                                                                        <div class="col">
                                                                            ₱
                                                                            <input type="text" id="below18" value=""
                                                                                select disabled>

                                                                        </div>
                                                                    </div>

                                                                    <div class="row" style="">
                                                                        <div class="col">
                                                                            <label for="">Child Burial (0 age -
                                                                                vault)</label>
                                                                        </div>
                                                                        <div class="col">
                                                                            ₱
                                                                            <input type="text" value="" select disabled>

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
                                                                            <input type="text" value="" select disabled>

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
                                                                                    value="">
                                                                                ₱

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
                                                                                    value="">
                                                                                ₱

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
                                                                                    value="">
                                                                                ₱

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
                                                                            <input type="text" value="" select disabled>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <label for="">Exhumation Fee</label>
                                                                        </div>
                                                                        <div class="col">
                                                                            ₱
                                                                            <input type="text" value="" select disabled>

                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <label for="">Burial Fee</label>

                                                                        </div>
                                                                        <div class="col">
                                                                            ₱
                                                                            <input type="text" value="" select disabled>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <label for="">Certified Photocopy Death
                                                                                Certificate</label>


                                                                        </div>
                                                                        <div class="col">
                                                                            ₱
                                                                            <input type="text" value="" select disabled>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>


                                                            <div class="col">
                                                                <div id="totalSection">
                                                                    <h4>Total Amount:</h4>
                                                                    ₱
                                                                    <input type="text" id="totalAmount" value="">
                                                                </div>
                                                            </div>
                                                            <form action="" method="POST">
                                                                <input type="hidden" name="nid"
                                                                    value="<?php echo $nid ?>">
                                                                <input type="hidden" name="id"
                                                                    value="<?php echo $profid ?>">
                                                                <button class="btn btn-success" name="paymentButton"
                                                                    type="submit">Payment</button>
                                                            </form>

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