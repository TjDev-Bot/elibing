<!DOCTYPE html>
<html lang="en">

<?php
require('assets/component/header.php');
require('assets/component/topnavbar.php');
require('assets/component/sidebars.php');
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
                        <div class="container">
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
                                                    <label for=""><?php echo $user_id ?></label>
                                                </div>
                                                <div class="col">
                                                    ₱
                                                    <input type="text" id="apartmentniche"
                                                        value="<?php echo number_format($apartmentniche, 2) ?>" select
                                                        disabled>

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
                                                        <input type="radio" id="b1" name="floatingNiche"
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
                                                        <input type="radio" id="b2" name="floatingNiche"
                                                            value=" <?php echo $floatingniche2nduser ?>">
                                                        ₱
                                                        <?php echo number_format($floatingniche2nduser, 2) ?>
                                                    </div>
                                                </div>

                                            </div>

                                            <br>
                                            <div class="row" style="<?php echo $below18ContainerStyle ?>">
                                                <div class="col">
                                                    <label for="">Child Burial (18 and
                                                        Below)</label>
                                                </div>
                                                <div class="col">
                                                    ₱
                                                    <input type="text" id="below18"
                                                        value="<?php echo number_format($below18, 2) ?>" select
                                                        disabled>

                                                </div>
                                            </div>

                                            <div class="row" style="<?php echo $age0ContainerStyle ?>">
                                                <div class="col">
                                                    <label for="">Child Burial (0 age -
                                                        vault)</label>
                                                </div>
                                                <div class="col">
                                                    ₱
                                                    <input type="text" value="<?php echo number_format($age0, 2) ?>"
                                                        select disabled>

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
                                                        value="<?php echo number_format($bonechamber, 2) ?>" select
                                                        disabled>

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
                                                        value="<?php echo number_format($exhupermitfee, 2) ?>" select
                                                        disabled>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <label for="">Exhumation Fee</label>
                                                </div>
                                                <div class="col">
                                                    ₱
                                                    <input type="text" value="<?php echo number_format($exhufee, 2) ?>"
                                                        select disabled>

                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    <label for="">Burial Fee</label>

                                                </div>
                                                <div class="col">
                                                    ₱
                                                    <input type="text" value="<?php echo number_format($burialfee, 2)?>"
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
                                                        value="<?php echo number_format($deathcertificate, 2)?>" select
                                                        disabled>
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
            </main>
        </div>
    </div>

    <?php
    require('assets/component/script.php');
    ?>


</body>

</html>