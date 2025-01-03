<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<?php
require('assets/component/header.php');
require('assets/component/topnavbar.php');
require('assets/component/sidebars.php');

include "../dbConn/conn.php";

$userID = isset($_SESSION['id']) ? $_SESSION['id'] : ''; 

if (isset($_GET['locid'])) {
    $block_id = $_GET['locid'];
    
    $select = "SELECT * FROM tblNicheLocation WHERE LocID = '$block_id'";
    $query = $conn->query($select); 
    while ($data = $query->fetch_assoc()) {
        $type = $data['Type'];
    
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
                            <h1>Niche Location</h1>
                        </li>

                    </ol>

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <div class="container">

                            <button class="btn btn-danger mb-4" type="button" name="submit"
                                onclick="goBack()">Back</button>
<<<<<<< HEAD
                            <form action="../dbConn/staff-adlocation.php" method="POST">
                                <input type="hidden" name="userid" value="<?php echo $userID ?>">
                                <input type="hidden" id="typeParam" value="<?php echo $type; ?>">
=======
<<<<<<< HEAD
                            <form action="../dbConn/staff-adlocation.php" method="POST">
                            <input type="hidden" name="userid" value="<?php echo $userID ?>">

=======
                            <form action="../dbConn/adlocation.php" method="POST">
                                <input type="hidden" name="userid" value="<?php echo $userID ?>">
                                <input type="text" id="typeParam" value="<?php echo $type; ?>">
>>>>>>> c9be5642966b076214c66ae87a16a96449635e9f
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
                                <input type="text" name="nicheno" placeholder="Generate Niche No." required>
                                <input type="text" name="size" placeholder="Size" required>
                                <input type="number" name="level" placeholder="Level" required>
                                <input type="hidden" name="locid" value="<?php echo $block_id ?>">
                                <input type="hidden" value="0" name="stat">
                                <input type="hidden" name="profid" value="<?php echo $profid ?>">
                                <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                            </form>
                            </br>
                            <div class="activity-log-container">
                                <div class="activity-log-container-scroll">
                                    <table class="table-no-border">
                                        <thead>
                                            <tr>
                                                <th style="display: none;">Niche ID</th>
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
                                                $shouldUpdateStatus = true;

                                                while ($dataloc = $queryloc->fetch_assoc()) {
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
                                                    

                                                    $countTotalQuery = "SELECT COUNT(*) AS totalRecords FROM tblBuriedRecord WHERE Nid = '$nicheid'";
                                                    $queryTotal = $conn->query($countTotalQuery);
                                                    $rowTotal = $queryTotal->fetch_assoc();
                                                    $totalRecords = $rowTotal['totalRecords'];

                                                    $countStatus1Query = "SELECT COUNT(*) AS status1Records FROM tblBuriedRecord WHERE Nid = '$nicheid' AND Status1 = 1";
                                                    $queryStatus1 = $conn->query($countStatus1Query);
                                                    $rowStatus1 = $queryStatus1->fetch_assoc();
                                                    $status1Records = $rowStatus1['status1Records'];

                                                    if ($totalRecords >= 0 && $totalRecords === $status1Records) {
                                                        $shouldUpdateStatus = false;

                                                    
                                                    }

                                                    if ($shouldUpdateStatus) {
                                                        $updateStatusQuery = "UPDATE tblNiche SET Status = 0 WHERE LocID = '$block_id'";
                                                        $updateStatusResult = $conn->query($updateStatusQuery);
                                                    
                                                        if (!$updateStatusResult) {
                                                            echo "Failed to update tblNiche status.";
                                                        }
                                                    }
                                                ?>
                                            
                                            <tr>

                                                <td style="display: none;"><?php echo $nicheid?></td>
                                                <td><?php echo $nno ?></td>
                                                <td><?php echo $level ?></td>
                                                <td><?php echo $size ?></td>
                                                <td><?php echo $statustoString ?></td>



                                                <td>
                                                    <button class="btn btn-primary "
                                                        onclick="addOcuppant('<?php echo $block_id; ?>', '<?php echo $nicheid; ?>')">
                                                        <i class='bx bx-show-alt'></i>
                                                    </button>
                                                    <!-- <button class="btn btn-danger"
                                                        onclick="openDelete(<?php echo $location_id; ?>, <?php echo $block_id; ?>)">
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
    var typeParam = document.getElementById("typeParam").value;

    function hideInputFields() {
        var inputFields = document.getElementById("inputFields");
        var addButton = document.getElementById("addButton");

        if (typeParam === "Chamber") {
            inputFields.style.display = "none";
            addButton.style.display = "none";
        } else {
            inputFields.style.display = "block";
            addButton.style.display = "block";
        }
    }

    window.onload = hideInputFields;


    function goBack() {
        var url = 'masterprofile.php'
        window.location.href = url;

    }

    function addOcuppant(block_id, nicheid) {

        var url = 'viewoccupant1.php?locid=' + block_id + '&nid=' + nicheid;

        window.location.href = url;

    }

    function openDelete(location_id, block_id) {
        var url = '../dbConn/deleteloc.php?loc_id=' + location_id + '&block_id=' + block_id;
        window.location.href = url;
    }


    document.getElementById("search-input").addEventListener("input", searchTable);
    </script>

    <?php
    require('assets/component/script.php');
    ?>


</body>

</html>