<!DOCTYPE html>
<html lang="en">

<?php
require('assets/component/header.php');
require('assets/component/topnavbar.php');
require('assets/component/sidebars.php');
include('../dbConn/conn.php');
require_once('../component/locfunction.php');
if(isset($_GET['id'])){
    $profid = $_GET['id'];
}

?>

<body>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">

                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">
                            <h1>Apartment</h1>
                        </li>
                    </ol>


                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <form action="../dbConn/delete_data.php" method="GET">
                            <input type="hidden" name="id" value="<?php echo $profid ?>">
                            <button class="btn btn-danger" type="submit">
                                Cancel
                            </button>
                        </form>
                        <br>
                        <div class="container">



                            <div class="activity-log-container">
                                <div class="activity-log-container-scroll">
                                    <table class="table-no-border">
                                        <thead>
                                            <tr>
                                                <th>Block No</th>
                                                <th>NL Name</th>
                                                <th>Size</th>
                                                <th>Description</th>
                                                <th>Type</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                               
                                                $select = "SELECT * FROM tblNicheLocation";
                                                $query = $conn->query($select);

                                                while($data = $query->fetch_assoc()){
                                                    $id = $data['LocID'];
                                                    $nlname = $data['NLName'];
                                                    $size = $data['Size'];
                                                    $description = $data['Description'];
                                                    $type = $data['Type'];
                                            ?>
                                            <tr>
                                                <td><?php echo $id ?></td>
                                                <td><?php echo $nlname ?></td>
                                                <td><?php echo $size ?></td>
                                                <td><?php echo $description?></td>
                                                <td><?php echo $type ?></td>
                                                <td>
                                                    <button class="btn btn-primary"
                                                        onclick="addNiche('<?php echo $profid; ?>', '<?php echo $id; ?>')">
                                                        <i class='bx bx-edit-alt'></i>
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
    function addNiche(profid, id) {
        console.log("addNiche called with id:", id);
        var url = 'niche.php?id=' + profid + '&locid=' + id;
        window.location.href = url;
    }
    </script>



    <?php
    require('assets/component/script.php');
    ?>


</body>

</html>