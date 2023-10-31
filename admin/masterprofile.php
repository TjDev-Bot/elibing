<<<<<<< HEAD
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
=======
<!DOCTYPE html>
<html lang="en">

>>>>>>> b72c3c4ba43fb1f2e4ade966189cf6b3d95c1687
<?php
require('assets/component/header.php');
require('assets/component/topnavbar.php');
require('assets/component/sidebars.php');
include('../dbConn/conn.php');
require_once('../component/locfunction.php');
<<<<<<< HEAD

$userID = isset($_SESSION['id']) ? $_SESSION['id'] : ''; 
if (isset($_GET['profid']) && isset($_GET['name']) ) {
    $profid = $_GET['profid'];
    $name = $_GET['name'];
}
=======
if(isset($_GET['profid']) && isset($_GET['name'])){
    $profid = $_GET['profid'];
    $name = $_GET['name'];
}

>>>>>>> b72c3c4ba43fb1f2e4ade966189cf6b3d95c1687
?>

<body>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
<<<<<<< HEAD
=======

>>>>>>> b72c3c4ba43fb1f2e4ade966189cf6b3d95c1687
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">
                            <h1>Master Profile</h1>
                        </li>
                    </ol>
<<<<<<< HEAD
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <div class="container">
                            <form action="../dbConn/block.php" method="POST">
                                <div class="">
                                    <select name="type" id="type" class="" onchange="toggleInputFields(this)">
                                        <option value="" selected disabled>Type</option>
=======

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <div class="container">

                            <form action="../dbConn/block.php" method="POST">
                                <div class="">
                                    <select name="type" id="type" class="">
>>>>>>> b72c3c4ba43fb1f2e4ade966189cf6b3d95c1687
                                        <option value="Chamber">Chamber</option>
                                        <option value="Apartment">Apartment</option>
                                    </select>
                                </div>
<<<<<<< HEAD
                                <br>
                                <div id="inputFields">
                                    <input type="hidden" name="userid" value="<?php echo $userID ?>">

                                    <input type="text" name="nlname" placeholder="Input Niche Location" readonly>
                                    <input type="text" name="size" placeholder="Input Size" readonly>
                                    <input type="text" name="description" placeholder="Input Description" readonly>
                                    <button class="btn btn-primary mb-4" id="addButton" type="submit" disabled>
                                        <i class="fa-solid fa-plus fa-lg" style="color: white;"></i> Add
                                    </button>
                                </div>
                            </form>
=======
                                <input type="text" name="nlname" placeholder="Input NL Name">
                                <input type="text" name="size" placeholder="Input Size">
                                <input type="text" name="description" placeholder="Input Description">

                                <input type="hidden" name="profid" value="<?php echo $profid?>">
                                <input type="hidden" name="name" value="<?php echo $name?> ">
                                <button class="btn btn-primary mb-4" type="submit">Add Block</button>
                            </form>

>>>>>>> b72c3c4ba43fb1f2e4ade966189cf6b3d95c1687
                            <div class="activity-log-container">
                                <div class="activity-log-container-scroll">
                                    <table class="table-no-border">
                                        <thead>
                                            <tr>
<<<<<<< HEAD
                                                <th>Location ID</th>
                                                <th>Niche Location</th>
=======
                                                <th>Block No</th>
                                                <th>NL Name</th>
>>>>>>> b72c3c4ba43fb1f2e4ade966189cf6b3d95c1687
                                                <th>Size</th>
                                                <th>Description</th>
                                                <th>Type</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<<<<<<< HEAD
                                            <?php
                                            $select = "SELECT * FROM tblNicheLocation";
                                            $query = $conn->query($select);
                                            while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
                                                $id = $data['LocID'];
                                                $nlname = $data['NLName'];
                                                $size = $data['Size'];
                                                $description = $data['Description'];
                                                $type = $data['Type'];
=======

                                            <?php
                                               
                                                $select = "SELECT * FROM tblNicheLocation";
                                                $query = $conn->query($select);

                                                while($data = $query->fetch(PDO::FETCH_ASSOC)){
                                                    $id = $data['LocID'];
                                                    $nlname = $data['NLName'];
                                                    $size = $data['Size'];
                                                    $description = $data['Description'];
                                                    $type = $data['Type'];
>>>>>>> b72c3c4ba43fb1f2e4ade966189cf6b3d95c1687
                                            ?>
                                            <tr>
                                                <td><?php echo $id ?></td>
                                                <td><?php echo $nlname ?></td>
                                                <td><?php echo $size ?></td>
<<<<<<< HEAD
                                                <td><?php echo $description ?></td>
=======
                                                <td><?php echo $description?></td>
>>>>>>> b72c3c4ba43fb1f2e4ade966189cf6b3d95c1687
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
<<<<<<< HEAD
=======

>>>>>>> b72c3c4ba43fb1f2e4ade966189cf6b3d95c1687
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
<<<<<<< HEAD
    function toggleInputFields(select) {
        var addButton = document.getElementById("addButton");
        var inputFields = document.getElementById("inputFields");

        var inputElements = inputFields.getElementsByTagName("input");

        if (select.value === "Apartment") {
            addButton.disabled = false;

            for (var i = 0; i < inputElements.length; i++) {
                inputElements[i].readOnly = false;
            }
        } else if (select.value === "Chamber") {
            addButton.disabled = false;

            for (var i = 0; i < inputElements.length; i++) {
                inputElements[i].readOnly = true;
            }
        } else {
            addButton.disabled = true;
        }
    }

=======
>>>>>>> b72c3c4ba43fb1f2e4ade966189cf6b3d95c1687
    function addNiche(id) {
        console.log("addNiche called with id:", id);
        var url = 'addniche.php?locid=' + id;
        window.location.href = url;
    }
    </script>


<<<<<<< HEAD
    <?php
    require('assets/component/script.php');
    ?>
=======

    <?php
    require('assets/component/script.php');
    ?>


>>>>>>> b72c3c4ba43fb1f2e4ade966189cf6b3d95c1687
</body>

</html>