<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="css/walkin.css">


<?php
require('assets/component/header.php');
require('assets/component/topnavbar.php');
require('assets/component/sidebars.php');

include "../dbConn/conn.php";


if (isset($_GET['profid'])) {
    $profId = $_GET['profid'];

    $select = "SELECT * FROM tblDeathRecord WHERE ProfileID = '$profId'";
    $query = $conn->query($select);

    while ($occupant = $query->fetch(PDO::FETCH_ASSOC)) {
    
        // $id = $occupant['occupant_id'];
        $name = $occupant['Fname'] . ' ' . $occupant['MName'] . ' ' . $occupant['Lname'] . ' ' .  $occupant['Suffix'];
        $dateofdeath = $occupant['DateofDeath'];
        $causeofdeath = $occupant['CauseofDeath'];
        $intermentplace = $occupant['IntermentPlace'];

        $intermentdatetime = date('F j, Y g:i A', strtotime($occupant['IntermentDateTime']));


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


                                                        </h3>
                                                        <button class="btn btn-danger" type="button" name="submit"
                                                            onclick="goBack('<?php echo $block_id ?>' , '<?php echo $nid ?>')">Back</button>
                                                        <p>
                                                        <div class="formbold-mb-5 w-full  formbold-px-3 flex">

                                                            <div class="formbold-mb-5 w-full  formbold-px-3">
                                                                <label for="name" class="formbold-form-label"></label>
                                                                Name
                                                                </label>
                                                                <input type="text" name="Lname" id="name"
                                                                    value="<?php echo $name ?>" required="required"
                                                                    class="formbold-form-input" readonly />
                                                            </div>

                                                            <div class="formbold-mb-5 w-full  formbold-px-3">
                                                                <label for="date" class="formbold-form-label">
                                                                    Date of Death </label>
                                                                <input type="date" name="DateofDeath" id="ddate"
                                                                    value="<?php echo $dateofdeath ?>" required
                                                                    class="formbold-form-input" readonly />
                                                            </div>

                                                        </div>
                                                        <div class="formbold-mb-5 w-full  formbold-px-3 flex">
                                                            <div class="formbold-mb-5 w-full  formbold-px-3">
                                                                <label for="name" class="formbold-form-label">Cause of
                                                                    Death
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
                                                        </div>
                                                        <div class="formbold-mb-5 w-full  formbold-px-3">
                                                            <label for="date" class="formbold-form-label">
                                                                Interment Date</label>
                                                            <input type="text" name="IntermentDate" id="ddate"
                                                                value="<?php echo $intermentdatetime; ?>" required
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
    function goBack(block_id, nicheno) {
        var url = 'viewoccupant1.php?locid=' + block_id + '&nid=' + nicheno;
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
</body>

</html>