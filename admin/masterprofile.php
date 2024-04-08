<<<<<<< HEAD
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
=======
<<<<<<< HEAD
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
=======
<<<<<<< HEAD
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
=======
<!DOCTYPE html>
<html lang="en">

>>>>>>> b72c3c4ba43fb1f2e4ade966189cf6b3d95c1687
>>>>>>> c9be5642966b076214c66ae87a16a96449635e9f
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
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
<<<<<<< HEAD

$userID = isset($_SESSION['id']) ? $_SESSION['id'] : ''; 
if (isset($_GET['profid']) && isset($_GET['name']) ) {
    $profid = $_GET['profid'];
    $name = $_GET['name'];
}
=======
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
>>>>>>> c9be5642966b076214c66ae87a16a96449635e9f
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
?>

<body>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======

>>>>>>> b72c3c4ba43fb1f2e4ade966189cf6b3d95c1687
>>>>>>> c9be5642966b076214c66ae87a16a96449635e9f
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">
                            <h1>Master Profile</h1>
                        </li>
                    </ol>
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <div class="container">
                            <form action="../dbConn/block.php" method="POST">
                                <div class="">
                                    <select name="type" id="type" class="" onchange="toggleInputFields(this)">
                                        <option value="" selected disabled>Type</option>
<<<<<<< HEAD
=======
=======

>>>>>>> c9be5642966b076214c66ae87a16a96449635e9f
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <div class="container">
                            <form action="../dbConn/block.php" method="POST">
                                <div class="">
<<<<<<< HEAD
                                    <select name="type" id="type" class="" onchange="toggleInputFields(this)">
                                        <option value="" selected disabled>Type</option>
=======
                                    <select name="type" id="type" class="">
>>>>>>> b72c3c4ba43fb1f2e4ade966189cf6b3d95c1687
>>>>>>> c9be5642966b076214c66ae87a16a96449635e9f
                                        <option value="Chamber">Chamber</option>
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
                                        <option value="Apartment">Apartment</option>
                                        <option value="Individual Bone Chamber">Individual Bone Chamber</option>
                                        <option value="Common Bone Chamber">Common Bone Chamber</option>
                                    </select>
                                </div>
<<<<<<< HEAD
                                <br>
                                <div id="inputFields">
                                    <input type="hidden" name="userid" value="<?php echo $userID ?>">
=======
<<<<<<< HEAD
                                <br>
                                <div id="inputFields">
                                    <input type="hidden" name="userid" value="<?php echo $userID ?>">

>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
                                    <input type="text" name="nlname" placeholder="Input Niche Location" readonly>
                                    <input type="text" name="size" placeholder="Input Size" readonly>
                                    <input type="text" name="description" placeholder="Input Description" readonly>
                                    <button class="btn btn-primary mb-4" id="addButton" type="submit" disabled>
                                        <i class="fa-solid fa-plus fa-lg" style="color: white;"></i> Add
                                    </button>
                                </div>
<<<<<<< HEAD
                            </form>
=======
                            </form>
=======
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
>>>>>>> c9be5642966b076214c66ae87a16a96449635e9f
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
                            <div class="activity-log-container">
                                <div class="activity-log-container-scroll">
                                    <table class="table-no-border">
                                        <thead>
                                            <tr>
<<<<<<< HEAD
                                                
                                                <th>Apartment</th>
=======
<<<<<<< HEAD
                                                <th>Location ID</th>
                                                <th>Niche Location</th>
=======
<<<<<<< HEAD
                                                <th>Location ID</th>
                                                <th>Niche Location</th>
=======
                                                <th>Block No</th>
                                                <th>NL Name</th>
>>>>>>> b72c3c4ba43fb1f2e4ade966189cf6b3d95c1687
>>>>>>> c9be5642966b076214c66ae87a16a96449635e9f
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
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
                                            while ($data = $query->fetch_assoc()) {
                                                $id = $data['LocID'];
                                                $nlname = $data['NLName'];
                                                $size = $data['Size'];
                                                $description = $data['Description'];
                                                $type = $data['Type'];
=======
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
>>>>>>> c9be5642966b076214c66ae87a16a96449635e9f
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
                                            ?>
                                            <tr>
                                                <td style="display: none;"><?php echo $id ?></td>
                                                <td><?php echo $nlname ?></td>
                                                <td><?php echo $size ?></td>
<<<<<<< HEAD
                                                <td><?php echo $description ?></td>
=======
<<<<<<< HEAD
                                                <td><?php echo $description ?></td>
=======
<<<<<<< HEAD
                                                <td><?php echo $description ?></td>
=======
                                                <td><?php echo $description?></td>
>>>>>>> b72c3c4ba43fb1f2e4ade966189cf6b3d95c1687
>>>>>>> c9be5642966b076214c66ae87a16a96449635e9f
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
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
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======

>>>>>>> b72c3c4ba43fb1f2e4ade966189cf6b3d95c1687
>>>>>>> c9be5642966b076214c66ae87a16a96449635e9f
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
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
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> c9be5642966b076214c66ae87a16a96449635e9f
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
    function toggleInputFields(select) {
        var addButton = document.getElementById("addButton");
        var inputFields = document.getElementById("inputFields");

        var inputElements = inputFields.getElementsByTagName("input");

        if (select.value === "Apartment") {
            addButton.disabled = false;

            for (var i = 0; i < inputElements.length; i++) {
                inputElements[i].readOnly = false;
            }
<<<<<<< HEAD
        } else if (select.value === "Individual Bone Chamber") {
            addButton.disabled = false;

            for (var i = 0; i < inputElements.length; i++) {
                inputElements[i].readOnly = true;
            }
        } else if (select.value === "Common Bone Chamber") {
=======
        } else if (select.value === "Chamber") {
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
            addButton.disabled = false;

            for (var i = 0; i < inputElements.length; i++) {
                inputElements[i].readOnly = true;
            }
        } else {
            addButton.disabled = true;
        }
    }

<<<<<<< HEAD
    // function addNiche(id) {
    //     console.log("addNiche called with id:", id);
    //     var url = 'addniche.php?locid=' + id;
    //     window.location.href = url;
    // }
=======
=======
>>>>>>> b72c3c4ba43fb1f2e4ade966189cf6b3d95c1687
    function addNiche(id) {
        console.log("addNiche called with id:", id);
        var url = 'addniche.php?locid=' + id;
        window.location.href = url;
    }
    </script>
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed

    </script>

<<<<<<< HEAD
    <?php
    require('assets/component/script.php');
    ?>
=======
<<<<<<< HEAD
    <?php
    require('assets/component/script.php');
    ?>
=======

    <?php
    require('assets/component/script.php');
    ?>
<<<<<<< HEAD
=======


>>>>>>> b72c3c4ba43fb1f2e4ade966189cf6b3d95c1687
>>>>>>> c9be5642966b076214c66ae87a16a96449635e9f
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
</body>

</html>