<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="css/walkin.css">

<?php
session_start();
include('../dbConn/conn.php');
require('assets/component/header.php');
require('assets/component/topnavbar.php');
require('assets/component/sidebars.php');

?>

<body>

    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>

                <div class="container-fluid px-4">
                    <!-- <h1 class="mt-4">Walk-in Appointment</h1> -->
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">
                            <h1>Add Reservation Appointment</h1>
                        </li>
                    </ol>
                    <div class="pcoded-inner-content">
                        <!-- Main-body start -->
                        <div class="main-body">
                            <div class="page-wrapper">
                                <!-- Page-body start -->
                                <div class="page-body">
                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="container-interment">
                                                <div class="formbold-main">
                                                    <div class="">
                                                        <?php
                                                            if(isset($_GET['Nid'])){
                                                                $nicheno = $_GET['Nid'];
                                                            }
                                                        ?>
                                                        <form
                                                            action="../dbConn/intermentadmin.php"
                                                            method="POST">
                                                    
                                                            <input type="hidden" name="Nid"
                                                                value="<?php echo $nicheno; ?>">
                                                            <div class="formbold-mb-5">
                                                                <label for="name"
                                                                    class="formbold-form-label">Relationship to the
                                                                    Deceased
                                                                </label>
                                                                <input type="text" name="relationship" id="name"
                                                                    placeholder="e.g Daughter" required="required"
                                                                    class="formbold-form-input" />
                                                            </div>
                                                            <div class="flex flex-wrap formbold--mx-3">
                                                                <div class="w-full sm:w-half formbold-px-3">
                                                                    <!-- <div class="formbold-mb-5">
                                                                        <label class="formbold-form-label  ">
                                                                            Address Details
                                                                        </label>
                                                                    </div>
                                                                    <div class="formbold-mb-5 flex ">

                                                                        <div class="formbold-mb-5 ">
                                                                            <div class="select">
                                                                                <select name="barangay" id="barangay">
                                                                                    <option selected disabled>Choose
                                                                                        your Barangay
                                                                                    </option>
                                                                                    <option value="b1">Apopong
                                                                                    </option>
                                                                                    <option value="b2">Baluan
                                                                                    </option>
                                                                                    <option value="b3">Batomelong
                                                                                    </option>
                                                                                    <option value="b4">Buayan
                                                                                    </option>
                                                                                    <option value="b5">Bula</option>
                                                                                    <option value="b6">Calumpang
                                                                                    </option>
                                                                                    <option value="b7">City Heights
                                                                                    </option>
                                                                                    <option value="b8">Conel
                                                                                    </option>
                                                                                    <option value="b9">Dadiangas
                                                                                        East</option>
                                                                                    <option value="b10">Dadiangas
                                                                                        North</option>
                                                                                    <option value="b11">Dadiangas
                                                                                        South</option>
                                                                                    <option value="b12">Dadiangas
                                                                                        West</option>
                                                                                    <option value="b13">Fatima
                                                                                    </option>
                                                                                    <option value="b14">Katangawan
                                                                                    </option>
                                                                                    <option value="b15">Labangal
                                                                                    </option>
                                                                                    <option value="b16">Lagao
                                                                                    </option>
                                                                                    <option value="b17">Ligaya
                                                                                    </option>
                                                                                    <option value="b18">Mabuhay
                                                                                    </option>
                                                                                    <option value="b19">Olympog
                                                                                    </option>
                                                                                    <option value="b20">San Isidro
                                                                                    </option>
                                                                                    <option value="b21">San Jose
                                                                                    </option>
                                                                                    <option value="b22">Siguel
                                                                                    </option>
                                                                                    <option value="b23">Sinawal
                                                                                    </option>
                                                                                    <option value="b24">Tambler
                                                                                    </option>
                                                                                    <option value="b25">Tinagacan
                                                                                    </option>
                                                                                    <option value="b26">Uper Labay
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="formbold-mb-5  formbold-px-3">
                                                                            <div class="select">
                                                                                <select name="purok" id="purok">
                                                                                    <option selected disabled>Choose
                                                                                        Purok</option>
                                                                                    <option value="prk1">Prk 1
                                                                                    </option>
                                                                                    <option value="prk2">Prk 2
                                                                                    </option>
                                                                                    <option value="prk3">Prk 3
                                                                                    </option>
                                                                                    <option value="prk4">Prk 4
                                                                                    </option>
                                                                                    <option value="prk5">Prk 5
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                    </div> -->
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="formbold-mb-5">
                                                                <div class="row">
                                                                    <div class="formbold-mb-5 flex">
                                                                        <div class="formbold-mb-5 w-full  ">
                                                                            <label for="name"
                                                                                class="formbold-form-label"> Last
                                                                                Name
                                                                            </label>
                                                                            <input type="text" name="Lname" id="name"
                                                                                placeholder="Enter Last Name"
                                                                                required="required"
                                                                                class="formbold-form-input" />
                                                                        </div>

                                                                        <div
                                                                            class="formbold-mb-5 w-full  formbold-px-3">
                                                                            <label for="name"
                                                                                class="formbold-form-label"> First
                                                                                Name
                                                                            </label>
                                                                            <input type="text" name="Fname" id="name"
                                                                                placeholder="Enter First Name"
                                                                                required="required"
                                                                                class="formbold-form-input" />
                                                                        </div>

                                                                        <div
                                                                            class="formbold-mb-5 w-full  formbold-px-3">
                                                                            <label for="name"
                                                                                class="formbold-form-label">
                                                                                Middle Name
                                                                            </label>
                                                                            <input type="text" name="MName" id="name"
                                                                                placeholder="Enter Middle Name"
                                                                                required="required"
                                                                                class="formbold-form-input" />
                                                                        </div>


                                                                    </div>

                                                                </div>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div
                                                                            class="formbold-mb-5 w-full  formbold-px-3">
                                                                            <label for="name"
                                                                                class="formbold-form-label">
                                                                                Suffix
                                                                            </label>
                                                                            <input type="text" name="Suffix" id="name"
                                                                                placeholder="Jr / Sr"
                                                                                class="formbold-form-input" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="formbold-mb-5">
                                                                            <label for="name"
                                                                                class="formbold-form-label">
                                                                                Cause of Death
                                                                            </label>
                                                                            <input type="text" name="cod" id="name"
                                                                                class="formbold-form-input" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="formbold-mb-5">
                                                                            <label for="date"
                                                                                class="formbold-form-label">
                                                                                Date of Death </label>
                                                                            <input type="date" name="deathdate"
                                                                                id="ddate" required="required"
                                                                                class="formbold-form-input" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="col">
                                                                        <div class="formbold-mb-5">
                                                                            <label for="name"
                                                                                class="formbold-form-label">Interment
                                                                                Place
                                                                            </label>
                                                                            <input type="text" name="IntermentPlace"
                                                                                id="name" placeholder="Enter Place"
                                                                                required class="formbold-form-input" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <!-- <label
                                                                        class="formbold-form-label formbold-form-label-2">
                                                                        Select Desired Date
                                                                    </label>
                                                                    <div class="formbold-mb-5 flex  ">
                                                                        <div class="formbold-mb-5 w-full  ">
                                                                            <label for="date"
                                                                                class="formbold-form-label">
                                                                                Date of Death </label>
                                                                            <input type="date" name="ddate" id="ddate"
                                                                                required="required"
                                                                                class="formbold-form-input" />
                                                                        </div>
                                                                        <div
                                                                            class="formbold-mb-5 w-full  formbold-px-3">
                                                                            <label for="time"
                                                                                class="formbold-form-label">
                                                                                Time </label>
                                                                            <input type="time" name="time" id="time"
                                                                                required="required"
                                                                                class="formbold-form-input" />
                                                                        </div>
                                                                    </div> -->
                                                                <?php
                                                                // if ($_SESSION['id']) {
                                                                //     $user_id = $_SESSION['id'];
                                                                //     $select = "SELECT * FROM tblUsersLogin WHERE UserID = ?";
                                                                //     $stmt = $conn->prepare($select);
                                                                //     $stmt->execute([$user_id]);
                                                                    
                                                                //     while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                                //         $id = $data['UserID'];
                                                                //         $name = $data['Createdby'];
                                                                //         $role = $data['Restriction'];
                                                                //     }
                                                                // }

                                                              
                                                            ?>

                                                                <!-- <div class="formbold-mb-5 w-full  formbold-px-3">
                                                                    <label for="time" class="formbold-form-label">
                                                                    </label>
                                                                    <input type="hidden" name="locid" id="" required
                                                                        class="formbold-form-input"
                                                                        value="" />
                                                                </div>
                                                                <div class="formbold-mb-5 w-full  formbold-px-3">
                                                                    <label for="time" class="formbold-form-label">
                                                                    </label>
                                                                    <input type="hidden" name="nid" id="" required
                                                                        class="formbold-form-input"
                                                                        value="" />
                                                                </div> -->


                                                                <div>
                                                                    <button class="formbold-btn-next" name="next"
                                                                        data-bs-target="#exampleModal">Next</button>
                                                                </div>


                                                        </form>
                                                        <!--<div>
                                                                <button class="formbold-btn-next" name="next"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#exampleModal">Next</button>
                                                            </div>-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
            </main>
        </div>

    </div>
</body>
<style>
.add-appointment {
    box-shadow: 0px 10px 14px -7px #276873;
    background: linear-gradient(to bottom, #4169e1 5%, #408c99 100%);
    background-color: #4169e1;
    border-radius: 8px;
    display: inline-block;
    cursor: pointer;
    color: #ffffff;
    font-family: Courier New;
    font-size: 20px;
    font-weight: bold;
    padding: 13px 32px;
    text-decoration: none;
    text-shadow: 0px 1px 0px #3d768a;
}

.add-appointment:hover {
    background: linear-gradient(to bottom, #4169e1 5%, #599bb3 100%);
    background-color: #4169e1;
}

.add-appointment:active {
    position: relative;
    top: 1px;
}
</style>



<script type="text/javascript" src="assets/js/script.js "></script>

</html>
<?php
require('assets/component/script.php');
?>