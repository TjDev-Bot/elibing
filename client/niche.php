<!DOCTYPE html>
<html lang="en">

<?php
require('assets/component/header.php');
require('assets/component/topnavbar.php');
require('assets/component/sidebars.php');

include "../dbConn/conn.php";


if (isset($_GET['locid']) && isset($_GET['id'])) {
    $block_id = $_GET['locid'];
    $profid = $_GET['id'];
    $select = "SELECT * FROM tblNicheLocation WHERE LocID = $block_id";
    // $query = mysqli_query($conn, $select);

    // while ($data = mysqli_fetch_assoc($query)) {
    //     $id = $data['block_id'];
    // }
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
                    <br>

                    <button class="btn btn-danger mb-2" type="button" name="submit" onclick="goBack('<?php echo $profid ?>')">Back</button>

                  

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <div class="container">
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
                                            while ($dataloc = $queryloc->fetch(PDO::FETCH_ASSOC)) {
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
                                                
                                            ?>
                                            <tr>

                                                <td style="display: none;"><?php echo $nicheid?></td>
                                                <td><?php echo $nno ?></td>
                                                <td><?php echo $level ?></td>
                                                <td><?php echo $size ?></td>
                                                <td><?php echo $statustoString ?></td>



                                                <td>
                                                    <button class="btn btn-primary "
                                                        onclick="addOcuppant('<?php echo $block_id; ?>', '<?php echo $nicheid; ?>' , '<?php echo $profid; ?>')">
                                                        <i class='bx bx-edit-alt'></i>
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
    function goBack(profid) {
        var url = 'location.php?id=' + profid;
        window.location.href = url;
    }

    function addOcuppant(block_id, nicheid, profid) {
        var url = 'occupant.php?locid=' + block_id + '&nid=' + nicheid + '&profid=' + profid;
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