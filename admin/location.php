<!DOCTYPE html>
<html lang="en">

<?php
require('assets/component/header.php');
require('assets/component/topnavbar.php');
require('assets/component/sidebars.php');
include('../dbConn/conn.php');
?>

<body>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">

                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">
                            <h1>Block</h1>
                        </li>
                    </ol>

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <div class="container">

                            <form action="../dbConn/block.php" method="POST">
                                <button class="btn btn-primary mb-4" type="submit">Add Block</button>
                            </form>

                            <div class="activity-log-container">
                                <div class="activity-log-container-scroll">
                                    <table class="table-no-border">
                                        <thead>
                                            <tr>
                                                <th>Block No</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $select = "SELECT block_id FROM block";
                                            $query = mysqli_query($conn, $select);

                                            while ($data = mysqli_fetch_array($query)) {
                                                $id = $data['block_id'];

                                            ?>
                                                <tr>
                                                    <td><?php echo "Block" . ' ' . $id ?></td>
                                                    <td>
                                                        <button class="btn btn-primary" onclick="addLocation(<?php echo $id; ?>)">
                                                            <i class='bx bx-edit-alt'></i>
                                                        </button>
                                                        <button class="btn btn-danger" onclick="openDelete(<?php echo $id; ?>)"><i class="fa-solid fa-trash"></i></button>
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
        function addLocation($id) {

            var url = 'niche.php?id=' + $id;

            window.location.href = url;

        }

        function openDelete($id) {
            var url = '../dbConn/delete.php?id=' + $id;
            window.location.href = url;
        }
    </script>



    <?php
    require('assets/component/script.php');
    ?>


</body>

</html>