<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="css/walkin.css">


<?php
require('assets/component/header.php');
require('assets/component/topnavbar.php');
require('assets/component/sidebars.php');

include "../dbConn/conn.php";


if (isset($_GET['id'])) {
    $occupant_id = $_GET['id'];
    $select = "SELECT * FROM chamber WHERE id = $id";
    $query = mysqli_query($conn, $select);

    // while ($data = mysqli_fetch_assoc($query)) {
    //     $id = $data['block_id'];
    // }

    while ($occupant = mysqli_fetch_assoc($query)) {
        $name = $occupant['fname'] . ' ' . $occupant['mname'] . ' ' . $occupant['lname'] . ' ' .  $occupant['suffix'];
        $dateofdeath = $occupant['dateofdeath'];
        $causeofdeath = $occupant['causeofdeath'];
    }
}
?>

<body>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">
                            <h1>Common Chamber</h1>
                        </li>
                    </ol>
                    
                    <div class="pcoded-inner-content">
                        <div class="main-body">
                            <div class="page-wrapper">
                                <div class="page-body">
                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="container-interment">
                                                <div class="formbold-main">
                                                    <div class="">
                                                        </h3>
                                                        <button class="btn btn-danger" type="button" name="submit" onclick="goBack()">Back</button>

                                                        <p>
                                                        <form action="../dbConn/chamber.php" method="POST" class="mb-4" style="float: right">
                                                        <div class="formbold-mb-5 flex">
                                                            <div class="formbold-mb-5 w-full  ">
                                                                <label for="name" class="formbold-form-label"> Last
                                                                    Name
                                                                </label>
                                                                <input type="text" name="lname" id="name" placeholder="Enter Last Name" required="required" class="formbold-form-input" />
                                                            </div>

                                                            <div class="formbold-mb-5 w-full  formbold-px-3">
                                                                <label for="name" class="formbold-form-label"> First
                                                                    Name
                                                                </label>
                                                                <input type="text" name="fname" id="name" placeholder="Enter First Name" required="required" class="formbold-form-input" />
                                                            </div>

                                                            <div class="formbold-mb-5 w-full  formbold-px-3">
                                                                <label for="name" class="formbold-form-label">
                                                                    Middle Name
                                                                </label>
                                                                <input type="text" name="mname" id="name" placeholder="Enter Middle Name" required="required" class="formbold-form-input" />
                                                            </div>

                                                            <div class="formbold-mb-5 w-full  formbold-px-3">
                                                                <label for="name" class="formbold-form-label">
                                                                    Suffix
                                                                </label>
                                                                <input type="text" name="suffix" id="name" placeholder="Jr / Sr" class="formbold-form-input" />
                                                            </div>
                                                        </div>

                                                        <div class="formbold-mb-5 w-full  formbold-px-3">
                                                            <label for="date" class="formbold-form-label">
                                                                Date of Death </label>
                                                            <input type="date" name="dateofdeath" id="date" required class="formbold-form-input" />
                                                        </div>

                                                        <div class="formbold-mb-5 w-full  formbold-px-3">
                                                            <label for="name" class="formbold-form-label">Cause of Death
                                                            </label>
                                                            <input type="text" name="causeofdeath" id="name" placeholder="" required class="formbold-form-input" />
                                                        </div>

                                                        <div>
                                                            <button class="formbold-btn-next" name="next" data-bs-target="#exampleModal">Submit</button>
                                                            
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
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

    <script>
        function goBack() {
            window.history.back();
        }

        function addOcuppant() {

            var url = 'form.php?';

            window.location.href = url;

        }
    </script>



    <?php
    require('assets/component/script.php');
    ?>

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

</body>

</html>