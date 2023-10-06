<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="css/walkin.css">


<?php
require('assets/component/header.php');
require('assets/component/topnavbar.php');
require('assets/component/sidebars.php');

include "../dbConn/conn.php";


if(isset($_GET['id'])){
    $occ_id = $_GET['id'];

    $select = "SELECT * FROM occupant INNER JOIN location on location.location_id = occupant.location_id WHERE occupant_id = $occ_id";
    $query = mysqli_query($conn, $select);
    while($data = mysqli_fetch_assoc($query)){
        $nameoccupant = $data['fname'].' '.$data['mname'].' '.$data['lname'];
        $block = $data['block_id'];
        $nicheno = $data['nicheno'];
        $level = $data['level'];
        $dateofdeath = $data['dateofdeath'];
        $causeofdeath = $data['causeofdeath'];
        $intermentplace = $data['intermentplace'];
        $intermentdate = $data['intermentdate'];
        $intermenttime = $data['intermenttime'];
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
                            <h1>View Occupant</h1>
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

                                                        <h3>
                                                            <?php echo "Block" . ' ' . $block ?>
                                                            ,
                                                            <?php echo  $nicheno ?>
                                                            ,
                                                            <?php echo "Level" . ' ' . $level ?>
                                                            ,
                                                            <?php echo "Occupant ID" . ' ' . $occ_id?>

                                                        </h3>
                                                        <button class="btn btn-danger" type="button" name="submit"
                                                            onclick="goBack()">Back</button>
                                                        <p>

                                                        <div class="formbold-mb-5 w-full  formbold-px-3">
                                                            <label for="name" class="formbold-form-label"></label>
                                                            Name
                                                            </label>
                                                            <input type="text" name="Lname" id="name"
                                                                value="<?php echo $nameoccupant ?>" required="required"
                                                                class="formbold-form-input" readonly />
                                                        </div>

                                                        <div class="formbold-mb-5 w-full  formbold-px-3">
                                                            <label for="date" class="formbold-form-label">
                                                                Date of Death </label>
                                                            <input type="date" name="DateofDeath" id="ddate"
                                                                value="<?php echo $dateofdeath ?>" required
                                                                class="formbold-form-input" readonly />
                                                        </div>

                                                        <div class="formbold-mb-5 w-full  formbold-px-3">
                                                            <label for="name" class="formbold-form-label">Cause of Death
                                                            </label>
                                                            <input type="text" name="CauseofDeath" id="name"
                                                                value="<?php echo $causeofdeath ?>" required
                                                                class="formbold-form-input" readonly />
                                                        </div>

                                                        <div class="formbold-mb-5 w-full  formbold-px-3">
                                                            <label for="name" class="formbold-form-label">Interment
                                                                Place
                                                            </label>
                                                            <input type="text" name="IntermentPlace" id="name"
                                                                value="<?php echo $intermentplace ?>" required
                                                                class="formbold-form-input" readonly />
                                                        </div>

                                                        <div class="formbold-mb-5 w-full  formbold-px-3">
                                                            <label for="date" class="formbold-form-label">
                                                                Interment Date</label>
                                                            <input type="date" name="IntermentDate" id="ddate"
                                                                value="<?php echo $intermentdate; ?>" required
                                                                class="formbold-form-input" readonly />
                                                        </div>

                                                        <div class="formbold-mb-5 w-full  formbold-px-3">
                                                            <label for="time" class="formbold-form-label">
                                                                Interment Time </label>
                                                            <input type="time" name="IntermentTime" id="time"
                                                                value="<?php echo $intermenttime; ?>" required
                                                                class="formbold-form-input" readonly />
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



        </div>
        </main>
    </div>
    </div>

    <script>
    function goBack() {
        window.history.back();
    }

    function viewOcuppant($location_id) {

        var url = 'viewoccupant.php?id=' + $location_id;

        window.location.href = url;

    }

    function addOcuppant($location_id) {

        var url = 'form.php?id=' + $location_id;

        window.location.href = url;

    }
    // JavaScript code for searching the table, same as before
    function searchTable() {
        const input = document.getElementById("search-input").value.toLowerCase();
        const tableRows = document.querySelectorAll("#table-body tr");

        for (const row of tableRows) {
            const name = row.querySelector("td:nth-child(2)").innerText.toLowerCase();
            const dateOfDeath = row.querySelector("td:nth-child(3)").innerText.toLowerCase();
            const intermentDate = row.querySelector("td:nth-child(4)").innerText.toLowerCase();

            if (name.includes(input) || dateOfDeath.includes(input) || intermentDate.includes(input)) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        }
    }

    document.getElementById("search-input").addEventListener("input", searchTable);
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
</body>

</html>