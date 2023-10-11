<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="css/walkin.css">

<?php
include('../dbConn/conn.php');
require('assets/component/header.php');
require('assets/component/topnavbar.php');
require('assets/component/sidebars.php');


if (isset($_GET['id'])) {
    $nicheno = $_GET['id'];
    $selects = "SELECT * FROM tblNiche WHERE Nid = '$nicheno'";
    $query = $conn->query($selects);
   
}

?>


<body>

    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
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
                                                        <button class="btn btn-danger mb-5" type="button" name="submit"
                                                            onclick="goBack()">Back</button>

                                                        <form action="../dbConn/adoccupant.php" method="POST">


                                                            <div class="formbold-mb-5 w-full  formbold-px-3">
                                                                <label for="time" class="formbold-form-label">
                                                                </label>
                                                                <input type="hidden" name="Nid" id="user_name" required
                                                                    class="formbold-form-input"
                                                                    value="<?php echo $nicheno ?>" />
                                                            </div>
                                                            <div class="formbold-mb-5">
                                                                <label for="name"
                                                                    class="formbold-form-label">Relationship to the
                                                                    Deceased
                                                                </label>
                                                                <input type="text" name="relationship" id="name"
                                                                    placeholder="e.g Daughter" required="required"
                                                                    class="formbold-form-input" />
                                                            </div>
                                                            <div class="formbold-mb-5 flex">
                                                                <div class="formbold-mb-5 w-full  ">
                                                                    <label for="name" class="formbold-form-label"> Last
                                                                        Name
                                                                    </label>
                                                                    <input type="text" name="Lname" id="name"
                                                                        placeholder="Enter Last Name"
                                                                        required="required"
                                                                        class="formbold-form-input" />
                                                                </div>

                                                                <div class="formbold-mb-5 w-full  formbold-px-3">
                                                                    <label for="name" class="formbold-form-label"> First
                                                                        Name
                                                                    </label>
                                                                    <input type="text" name="Fname" id="name"
                                                                        placeholder="Enter First Name"
                                                                        required="required"
                                                                        class="formbold-form-input" />
                                                                </div>

                                                                <div class="formbold-mb-5 w-full  formbold-px-3">
                                                                    <label for="name" class="formbold-form-label">
                                                                        Middle Name
                                                                    </label>
                                                                    <input type="text" name="MName" id="name"
                                                                        placeholder="Enter Middle Name"
                                                                        required="required"
                                                                        class="formbold-form-input" />
                                                                </div>

                                                                <div class="formbold-mb-5 w-full  formbold-px-3">
                                                                    <label for="name" class="formbold-form-label">
                                                                        Suffix
                                                                    </label>
                                                                    <input type="text" name="Suffix" id="name"
                                                                        placeholder="Jr / Sr"
                                                                        class="formbold-form-input" />
                                                                </div>
                                                            </div>

                                                            <div class="formbold-mb-5 w-full  ">
                                                                <label for="date" class="formbold-form-label">
                                                                    Date of Death </label>
                                                                <input type="date" name="DateofDeath" id="ddate"
                                                                    required class="formbold-form-input" />
                                                            </div>
                                                    </div>
                                                    <div class="formbold-mb-5">
                                                        <label for="name" class="formbold-form-label">Cause of Death
                                                        </label>
                                                        <input type="text" name="CauseofDeath" id="name" placeholder=""
                                                            required class="formbold-form-input" />
                                                    </div>

                                                    <div class="formbold-mb-5">
                                                        <label for="name" class="formbold-form-label">Interment Place
                                                        </label>
                                                        <input type="text" name="IntermentPlace" id="name"
                                                            placeholder="Enter Place" required
                                                            class="formbold-form-input" />
                                                    </div>

                                                    <!-- <div class="formbold-mb-5">
                                                        <div class="formbold-mb-5 flex  ">
                                                            <div class="formbold-mb-5 w-full  ">
                                                                <label for="date" class="formbold-form-label">
                                                                    Interment Date </label>
                                                                <input type="date" name="IntermentDate" id="ddate" required class="formbold-form-input" />
                                                            </div>
                                                            <div class="formbold-mb-5 w-full  formbold-px-3">
                                                                <label for="time" class="formbold-form-label">
                                                                    Interment Time </label>
                                                                <input type="time" name="IntermentTime" id="time" required class="formbold-form-input" />
                                                            </div>
                                                        </div>
                                                    </div> -->

                                                    <hr>
                                                </div>

                                                <!--?php
                                                    if ($_SESSION['id']) {
                                                        $user_id = $_SESSION['id'];
                                                        $select = "SELECT * FROM users WHERE id = $user_id";
                                                        $query = mysqli_query($conn, $select);
                                                        while ($data = mysqli_fetch_assoc($query)) {
                                                            $id = $data['id'];
                                                            $name = $data['firstname'] . ' ' . $data['midname'] . ' ' . $data['lastname'];
                                                            $role = $data['role'];
                                                        }
                                                    }
                                                    ?-->


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

<script>
function goBack() {
    window.history.back();
}
</script>

<script type="text/javascript" src="assets/js/script.js "></script>

</html>
<?php
require('assets/component/script.php');
?>