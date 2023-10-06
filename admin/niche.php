<!DOCTYPE html>
<html lang="en">

<?php
require('assets/component/header.php');
require('assets/component/topnavbar.php');
require('assets/component/sidebars.php');

include "../dbConn/conn.php";


if (isset($_GET['id'])) {
    $block_id = $_GET['id'];
    $select = "SELECT * FROM block WHERE block_id = $block_id";
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

                    <h3>
                        <?php echo "Block" . ' ' . $block_id ?>
                    </h3>

                    <button class="btn btn-danger mb-2" type="button" name="submit" onclick="goBack()">Back</button>

                    <form action="../dbConn/adlocation.php" method="POST" class="mb-4" style="float: right">
                        <label for="">Niche No</label>
                        <input type="text" name="nicheno">
                        <label for="">Level</label>
                        <input type="number" name="level">
                        <input type="hidden" name="bid" value="<?php echo $block_id ?>">
                        <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                    </form>

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <div class="container">
                            <div class="activity-log-container">
                                <div class="activity-log-container-scroll">
                                    <table class="table-no-border">
                                        <thead>
                                            <tr>
                                                <th>Niche No</th>
                                                <th>Level</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $selectloc = "SELECT * FROM location WHERE block_id = $block_id ORDER BY level ASC";
                                            $queryloc = mysqli_query($conn, $selectloc);
                                            while ($dataloc = mysqli_fetch_array($queryloc)) {
                                                $location_id = $dataloc['location_id'];
                                                $nicheno = $dataloc['nicheno'];
                                                $level = $dataloc['level'];
                                                $status = $dataloc['status'];

                                            ?>
                                            <tr>

                                                <td><?php echo $nicheno ?></td>
                                                <td><?php echo $level ?></td>
                                                <td><?php echo $status ?></td>

                                                <td>
                                                    <button class="btn btn-primary "
                                                        onclick="addOcuppant(<?php echo $location_id; ?>)">
                                                        <i class='bx bx-edit-alt'></i>
                                                    </button>
                                                    <button class="btn btn-danger"
                                                        onclick="openDelete(<?php echo $location_id; ?>, <?php echo $block_id; ?>)">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>


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
    function goBack() {
        var url = 'location.php'
        window.location.href = url;

    }

    function addOcuppant($location_id) {

        var url = 'occupant.php?id=' + $location_id;

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