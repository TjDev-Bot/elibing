<!DOCTYPE html>
<html lang="en">

<?php
require('assets/component/header.php');
require('assets/component/topnavbar.php');
require('assets/component/sidebars.php');

include "../dbConn/conn.php";


if (isset($_GET['LocID']) && isset($_GET['Nid'])) {
    $nicheno = $_GET['Nid'];
    $block_id = $_GET['LocID'];
    $selectt = "SELECT * FROM tblNiche WHERE Nid = '$nicheno'";
    $query = $conn->query($selectt);
    while ($occupant = $query->fetch(PDO::FETCH_ASSOC)) {
        // $nicheno = $occupant['Nid'];
        $level = $occupant['Level'];
        // $status = $occupant['Status'];
        // $nno = $occupant['Nno'];
        // $size = $occupant['Size'];
    }
}


?>



<body>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <!-- <h1 class="mt-4">Niche</h1> -->
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">
                            <h1>Occupant List</h1>
                        </li>

                    </ol>
                    <h3>
                        <?php echo "Block" . ' ' . $block_id ?>
                        ,
                        <?php echo  $nicheno ?>
                        ,
                        <?php echo "Level" . ' ' . $level ?>

                    </h3>

                    <button class="btn btn-danger mb-4 " type="button" name="submit"
                        onclick="goBack('<?php echo $block_id; ?>')">Back</button>

                    <button class="btn btn-danger mb-4" style="float: right" type="button" name="submit"
                        onclick="resOcuppant('<?php echo $nicheno ?>')">Reserve</button>
                    <button class="btn btn-primary mb-4" style="float: right" type="button" name="submit"
                        onclick="addOcuppant('<?php echo $nicheno; ?>')">Add</button>


                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <div class="container">

                            <!-- <input type="search" id="search-input" placeholder="Search here..."> -->
                            <div class="activity-log-container">
                                <div class="activity-log-container-scroll">
                                    <table class="table-no-border">
                                        <thead>
                                            <tr>
                                                <th>ID Number</th>
                                                <th>Name</th>
                                                <th>Date of Death</th>
                                                <th>Interment Place</th>
                                                <th>Interment Date & Time</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            // $selectocc = "SELECT * FROM tblDeathRecord";
                                            // $queryocc = $conn->query($selectocc);
                                    
                                           
                                            // $select = "SELECT * FROM tblNiche
                                            // INNER JOIN tblIntermentReservation ON tblNiche.Nid = tblIntermentReservation.Nid
                                            // INNER JOIN tblDeathRecord ON tblIntermentReservation.ProfID = tblDeathRecord.ProfileID 
                                            // INNER JOIN tblNicheLocation ON tblNiche.LocID = tblNicheLocation.LocID WHERE LocID = '$block_id' ";

                                            $select = "SELECT * FROM tblNiche
                                            INNER JOIN tblIntermentReservation ON tblNiche.Nid = tblIntermentReservation.Nid
                                            INNER JOIN tblDeathRecord ON tblIntermentReservation.ProfID = tblDeathRecord.ProfileID 
                                            INNER JOIN tblNicheLocation ON tblNiche.LocID = tblNicheLocation.LocID WHERE tblNiche.Nid = '$nicheno'";

                                 
                                            $queryocc = $conn->query($select);
                                            while ($data = $queryocc->fetch(PDO::FETCH_ASSOC)) {
                                                $profileid = $data['ProfileID'];
                                                $dateofdeath = $data['DateofDeath'];
                                                $name = $data['Fname'] . ' ' . $data['MName'] . ' ' . $data['Lname'] . ' ' . $data['Suffix'];
                                                $intermentplace = $data['IntermentPlace'];
                                                $intermentdatetime = $data['IntermentDateTime'];


                                                if($intermentdatetime === null){
                                                    $intermentdatetime = "N/A";
                                                } else {
                                                    $intermentdatetime = date('F j, Y g:i A', strtotime($intermentdatetime));

                                                }

                                            ?>

                                            
                                            <tr>

                                                <td class="px-6 py-4">
                                                    <?php echo $profileid  ?>
                                                </td>

                                                <td class="px-6 py-4">
                                                    <?php echo $name ?>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <?php echo $dateofdeath ?>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <?php echo $intermentplace ?>
                                                </td>

                                                <td class="px-6 py-4">
                                                    <?php echo $intermentdatetime ?>
                                                </td>

                                                <td>
                                                    <button class="btn btn-primary "
                                                        onclick="viewOcuppant('<?php echo $profileid; ?>')">
                                                        <i class='bx bx-edit-alt'></i>
                                                    </button>
                                                    <!-- <button class="btn btn-danger"
                                                        onclick="openDelete('<?php echo $profileid; ?>', '<?php echo $block_id; ?>', '<?php echo $nicheno; ?>')">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button> -->
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
            </main>
        </div>
    </div>

    <script>
    function goBack($block_id) {
        var url = 'niche.php?LocId=' + $block_id;
        window.location.href = url;
    }

    function viewOcuppant($occupant_id) {

        var url = 'viewoccupant.php?id=' + $occupant_id;

        window.location.href = url;

    }

    function resOcuppant(nicheno) {

        var url = 'appointment.php?Nid=' + nicheno;

        window.location.href = url;

    }

    function addOcuppant(nicheno) {

        var url = 'form.php?id=' + nicheno;

        window.location.href = url;

    }

    function openDelete(profileid, block_id, nicheno) {
        var url = '../dbConn/deleteocc.php?occ_id=' + occupant_id + '&block_id=' + block_id;
        window.location.href = url;
    }
    </script>

    <?php
    require('assets/component/script.php');
    ?>

</body>

</html>