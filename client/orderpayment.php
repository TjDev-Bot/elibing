<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
</script>
<?php
require('assets/component/header.php');
require('assets/component/topnavbar.php');
require('assets/component/sidebars.php');
include "../dbConn/conn.php";


?>




<body>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <!-- <h1 class="mt-4">Due Cadavers</h1> -->
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">
                            <h1>Order Payment</h1>
                        </li>
                    </ol>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <?php
                                 if(isset($_GET['profid'])){
                                    $profid = $_GET['profid'];
                                }
                       ?>

                        <a href='gatepass.php?profid=<?php echo $profid; ?>'>
                            <button class="btn btn-success" type="submit" name="paymentButton">Payment</button>
                        </a>

                        <div class="container">
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
                                                <input type="text" id="apartmentniche" value="" select disabled>

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
                                                    <input type="radio" id="b1" name="floatingNiche" value="">
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
                                                    <input type="radio" id="b2" name="floatingNiche" value="">
                                                    ₱

                                                </div>
                                            </div>

                                        </div>

                                        <br>
                                        <div class="row" style="<?php ?>">
                                            <div class="col">
                                                <label for="">Child Burial (18 and
                                                    Below)</label>
                                            </div>
                                            <div class="col">
                                                ₱
                                                <input type="text" id="below18" select disabled>

                                            </div>
                                        </div>

                                        <div class="row" style="">
                                            <div class="col">
                                                <label for="">Child Burial (0 age -
                                                    vault)</label>
                                            </div>
                                            <div class="col">
                                                ₱
                                                <input type="text" select disabled>

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
                                                <input type="text">

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
                                                    <input type="radio" id="" name="mau" value="">
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
                                                    <input type="radio" id="" name="mau" value="">
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
                                                    <input type="radio" id="" name="mau" value="">
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
                                                <input type="text" disabled>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label for="">Exhumation Fee</label>
                                            </div>
                                            <div class="col">
                                                ₱
                                                <input type="text" select disabled>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <label for="">Burial Fee</label>

                                            </div>
                                            <div class="col">
                                                ₱
                                                <input type="text" select disabled>
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
                                        <input type="text" id="totalAmount" value="<?php echo number_format() ?>">
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
    function view(profid) {
        var url = 'gatepass.php?profid=' + profid;
        window.location.href = url;
    }
    </script>

    <?php
    require('assets/component/script.php');
    ?>


</body>

</html>