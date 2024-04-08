<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<?php
require('assets/component/header.php');
require('assets/component/topnavbar.php');
require('assets/component/sidebars.php');
include('../dbConn/conn.php');
require_once('../component/locfunction.php');

$userID = isset($_SESSION['id']) ? $_SESSION['id'] : ''; 
if (isset($_GET['profid']) && isset($_GET['name']) ) {
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
                            <form action="../dbConn/staff-block.php" method="POST">
                                <div class="">
                                    <select name="type" id="type" class="" onchange="toggleInputFields(this)">
                                        <option value="" selected disabled>Type</option>
                                        <option value="Apartment">Apartment</option>
                                        <option value="Individual Bone Chamber">Individual Bone Chamber</option>
                                        <option value="Common Bone Chamber">Common Bone Chamber</option>
                                    </select>
                                </div>
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
                            <div class="activity-log-container">
                                <div class="activity-log-container-scroll">
                                    <table class="table-no-border">
                                        <thead>
                                            <tr>
                                                <th>Location ID</th>
                                                <th>Niche Location</th>
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
                                            while ($data = $query->fetch_assoc()) {
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
                                                <td><?php echo $description ?></td>
                                                <td><?php echo $type ?></td>
                                                <td>
                                                   <?php 
                                                       if ($type === 'Common Bone Chamber') {
                                                        echo "<a href='chamber.php?locid=$id' class='btn btn-primary'><i class='bx bx-show-alt'></i></a>";
                                                    } elseif ($type === 'Individual Bone Chamber') {
                                                        echo "<a href='addniche.php?locid=$id' class='btn btn-primary'><i class='bx bx-show-alt'></i></a>";
                                                    } elseif ($type === 'Apartment') {
                                                        echo "<a href='addniche.php?locid=$id' class='btn btn-primary'><i class='bx bx-show-alt'></i></a>";
                                                    }
                                                   ?>
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
    function toggleInputFields(select) {
        var addButton = document.getElementById("addButton");
        var inputFields = document.getElementById("inputFields");

        var inputElements = inputFields.getElementsByTagName("input");

        if (select.value === "Apartment") {
            addButton.disabled = false;

            for (var i = 0; i < inputElements.length; i++) {
                inputElements[i].readOnly = false;
            }
        } else if (select.value === "Individual Bone Chamber") {
            addButton.disabled = false;

            for (var i = 0; i < inputElements.length; i++) {
                inputElements[i].readOnly = true;
            }
        } else if (select.value === "Common Bone Chamber") {
            addButton.disabled = false;

            for (var i = 0; i < inputElements.length; i++) {
                inputElements[i].readOnly = true;
            }
        } else {
            addButton.disabled = true;
        }
    }

    // function addNiche(id) {
    //     console.log("addNiche called with id:", id);
    //     var url = 'addniche.php?locid=' + id;
    //     window.location.href = url;
    // }

    </script>

    <?php
    require('assets/component/script.php');
    ?>
</body>

</html>