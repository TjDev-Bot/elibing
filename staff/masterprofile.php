<!DOCTYPE html>
<html lang="en">

<?php
require('assets/component/header.php');
require('assets/component/topnavbar.php');
require('assets/component/sidebars.php');
include('../dbConn/conn.php');
require_once('../component/locfunction.php');
if(isset($_GET['profid']) && isset($_GET['name'])){
    $profid = $_GET['profid'];
    $name = $_GET['name'];
}

?>

<body>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">

                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">
                            <h1>Master Profile</h1>
                        </li>
                    </ol>

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <div class="container">

                            <form action="../dbConn/staffblock.php" method="POST">
                                <div class="">
                                    <select name="type" id="type" class="" onchange="enableAddButton(this)">
                                        <option value="" selected disabled>Type</option>
                                        <option value="Chamber">Chamber</option>
                                        <option value="Apartment">Apartment</option>
                                    </select>
                                </div>
                                </br>
                                <input type="text" name="nlname" placeholder="Input NL Name">
                                <input type="text" name="size" placeholder="Input Size">
                                <input type="text" name="description" placeholder="Input Description">

                                <input type="hidden" name="profid" value="<?php echo $profid?>">
                                <input type="hidden" name="name" value="<?php echo $name?> ">
                                <button class="btn btn-primary mb-4" id="addButton" type="submit" disabled><i
                                        class="fa-solid fa-plus fa-lg" style="color: white;"></i> Add</button>
                            </form>

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

                                                while($data = $query->fetch(PDO::FETCH_ASSOC)){
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
                                                        onclick="addNiche('<?php echo $id; ?>')">
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
    function enableAddButton(select) {
        var addButton = document.getElementById("addButton");
        if (select.value !== "") {
            addButton.disabled = false;
        } else {
            addButton.disabled = true;
        }
    }

    function addNiche(id) {
        console.log("addNiche called with id:", id);
        var url = 'addniche.php?locid=' + id;
        window.location.href = url;
    }
    </script>



    <?php
    require('assets/component/script.php');
    ?>


</body>

</html>