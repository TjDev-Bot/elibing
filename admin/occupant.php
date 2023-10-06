<!DOCTYPE html>
<html lang="en">

<?php
require('assets/component/header.php');
require('assets/component/topnavbar.php');
require('assets/component/sidebars.php');

include "../dbConn/conn.php";


if (isset($_GET['id'])) {
    $location_id = $_GET['id'];
    $select = "SELECT * FROM location WHERE location_id = $location_id";
    $query = mysqli_query($conn, $select);

    // while ($data = mysqli_fetch_assoc($query)) {
    //     $id = $data['block_id'];
    // }

    while ($occupant = mysqli_fetch_assoc($query)) {
        $block_id = $occupant['block_id'];
        $nicheno = $occupant['nicheno'];
        $level = $occupant['level'];
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
                        onclick="goBack(<?php echo $block_id; ?>)">Back</button>

                    <button class="btn btn-primary mb-4" style="float: right" type="button" name="submit"
                        onclick="addOcuppant(<?php echo $location_id; ?>)">Add</button>


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
                                                <th>Interment Date & Time</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $selectocc = "SELECT * FROM occupant WHERE location_id = $location_id";
                                            $queryocc = mysqli_query($conn, $selectocc);
                                            while ($data = mysqli_fetch_array($queryocc)) {
                                                $occupant_id = $data['occupant_id'];
                                                $name = $data['fname'] . ' ' . $data['mname'] . ' ' . $data['lname'] . ' ' . $data['suffix'];
                                                $interment =  $data['intermentdate'] . ' ' . $data['intermenttime'];

                                            ?>
                                            <tr>
                                                <td class="px-6 py-4">
                                                    <?php echo $occupant_id ?>
                                                </td>

                                                <td class="px-6 py-4">
                                                    <?php echo $name ?>
                                                </td>

                                                <td class="px-6 py-4">
                                                    <?php echo date('F j, Y g:i A', strtotime($interment)); ?>
                                                </td>

                                                <td>
                                                    <button class="btn btn-primary "
                                                        onclick="viewOcuppant(<?php echo $occupant_id; ?>)">
                                                        <i class='bx bx-edit-alt'></i>
                                                    </button>
                                                    <button class="btn btn-danger"
                                                        onclick="openDelete(<?php echo $occupant_id; ?>, <?php echo $block_id; ?>, )">
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
    function goBack($block_id) {
        var url = 'niche.php?id=' + $block_id;
        window.location.href = url;
    }

    function viewOcuppant($occupant_id) {

        var url = 'viewoccupant.php?id=' + $occupant_id;

        window.location.href = url;

    }

    function addOcuppant($location_id) {

        var url = 'form.php?id=' + $location_id;

        window.location.href = url;

    }

    function openDelete(occupant_id, block_id) {
        var url = '../dbConn/deleteocc.php?occ_id=' + occupant_id + '&block_id=' + block_id;
        window.location.href = url;
    }
    </script>

    <?php
    require('assets/component/script.php');
    ?>

</body>

</html>