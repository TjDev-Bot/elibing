<!DOCTYPE html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
<link href="assets/css/table.css" rel="stylesheet" />

<?php
include('../dbConn/conn.php');
require_once('component/header.php');
if (isset($_GET['locid']) && isset($_GET['nid']) && isset($_GET['profid'])) {
    $nicheno = $_GET['nid'];
    $block_id = $_GET['locid'];
    $profid = $_GET['profid'];
    $selectt = "SELECT * FROM tblNiche WHERE Nid = '$nicheno'";
    $query = $conn->query($selectt);
    while ($occupant = $query->fetch(PDO::FETCH_ASSOC)) {
        // $nicheno = $occupant['Nid'];
        $level = $occupant['Level'];
        // $status = $occupant['Status'];
        // $nno = $occupant['Nno'];
        // $size = $occupant['Size'];
    }
}

?>


<body>

    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-container navbar-wrapper">
            <!-- Top Nav Bar-->
            <?php require_once('component/topnavbar.php'); ?>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <!-- Sidebar -->
                    <?php require_once('component/sidebar.php'); ?>
                    <div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Dashboard</h5>
                                            <p class="m-b-0">Welcome to Appointment</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="index.php"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-sm">
                                                <div class="row">
                                                    <div class="col">
                                                        <button class="btn btn-danger mb-2" type="button" name="submit"
                                                            onclick="goBack('<?php echo $block_id ?>', '<?php echo $profid ?>')">Back</button>

                                                    </div>
                                                    <div class="col-sm-2">
                                                        <form action="../dbConn/intermentadmin.php" method="POST">
                                                            <input type="hidden" name="profid"
                                                                value="<?php echo $profid ?>">
                                                            <input type="hidden" name="nicheno"
                                                                value="<?php echo $nicheno ?>">
                                                            <input type="hidden" name="blockid"
                                                                value="<?php echo $block_id ?>">
                                                            <button class="btn btn-success submit-button mb-3"
                                                                type="button" id="updateButton">
                                                                <span class="update-label">Reserve</span>
                                                                <div class="loader"></div>
                                                            </button>

                                                        </form>
                                                        <div style="display:none;" id="response"></div>

                                                    </div>
                                                </div>
                                                <div class="container-interment">
                                                    <div class="formbold-main">
                                                        <div class="">
                                                            <div
                                                                class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                                                <div class="container">

                                                                    <!-- <input type="search" id="search-input" placeholder="Search here..."> -->
                                                                    <div class="activity-log-container">
                                                                        <div class="activity-log-container-scroll">
                                                                            <table class="table-no-border">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>ID Number</th>
                                                                                        <th>Name</th>
                                                                                        <th>Date of Death</th>
                                                                                        <th>Interment Place</th>
                                                                                        <th>Interment Date & Time</th>
                                                                                        <th>Action</th>
                                                                                    </tr>
                                                                                </thead>

                                                                                <tbody>
                                                                                    <?php
                                                                                    // $selectocc = "SELECT * FROM tblDeathRecord";
                                                                                    // $queryocc = $conn->query($selectocc);
                                                                            
                                                                                
                                                                                    // $select = "SELECT * FROM tblNiche
                                                                                    // INNER JOIN tblIntermentReservation ON tblNiche.Nid = tblIntermentReservation.Nid
                                                                                    // INNER JOIN tblDeathRecord ON tblIntermentReservation.ProfID = tblDeathRecord.ProfileID 
                                                                                    // INNER JOIN tblNicheLocation ON tblNiche.LocID = tblNicheLocation.LocID WHERE LocID = '$block_id' ";

                                                                                    $select = "SELECT * FROM tblNiche
                                                                                    INNER JOIN tblIntermentReservation ON tblNiche.Nid = tblIntermentReservation.Nid
                                                                                    INNER JOIN tblDeathRecord ON tblIntermentReservation.ProfID = tblDeathRecord.ProfileID 
                                                                                    INNER JOIN tblNicheLocation ON tblNiche.LocID = tblNicheLocation.LocID WHERE tblIntermentReservation.Nid = '$nicheno' ORDER BY ProfID DESC";

                                                                        
                                                                                    $queryocc = $conn->query($select);
                                                                                    while ($data = $queryocc->fetch(PDO::FETCH_ASSOC)) {
                                                                                        $profileid = $data['ProfileID'];
                                                                                        $dateofdeath = $data['DateofDeath'];
                                                                                        $name = $data['Fname'] . ' ' . $data['MName'] . ' ' . $data['Lname'] . ' ' . $data['Suffix'];
                                                                                        $intermentplace = $data['IntermentPlace'];
                                                                                        $intermentdatetime = $data['IntermentDateTime'];


                                                                                        if($intermentdatetime === null){
                                                                                            $intermentdatetime = "N/A";
                                                                                        } else {
                                                                                            $intermentdatetime = date('F j, Y g:i A', strtotime($intermentdatetime));
                                                                                        }
                                                                                    ?>


                                                                                    <tr>

                                                                                        <td class="px-6 py-4">
                                                                                            <?php echo $profileid  ?>
                                                                                        </td>

                                                                                        <td class="px-6 py-4">
                                                                                            <?php echo $name ?>
                                                                                        </td>
                                                                                        <td class="px-6 py-4">
                                                                                            <?php echo $dateofdeath ?>
                                                                                        </td>
                                                                                        <td class="px-6 py-4">
                                                                                            <?php echo $intermentplace ?>
                                                                                        </td>

                                                                                        <td class="px-6 py-4">
                                                                                            <?php echo $intermentdatetime ?>
                                                                                        </td>

                                                                                        <td class="px-6 py-4">
                                                                                            <input type="hidden"
                                                                                                value="<?php echo $block_id ?>">
                                                                                            <input type="hidden"
                                                                                                value="<?php echo $nicheno ?>">
                                                                                            <input type="hidden"
                                                                                                value="<?php echo $profid ?>">
                                                                                            <input type="hidden"
                                                                                                value="<?php echo $level ?>">
                                                                                            <button
                                                                                                class="btn btn-primary "
                                                                                                onclick="viewOcuppant('<?php echo $block_id ?>', '<?php echo $nicheno ?>', '<?php echo $profid ?>', '<?php echo $level ?>')">
                                                                                                <i
                                                                                                    class='bx bx-edit-alt'></i>
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
                <div id="styleSelector"> </div>
            </div>
        </div>
    </div>
    <style>
    .loader {
        border: 4px solid rgba(255, 255, 255, 0.3);
        border-top: 4px solid #3498db;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        animation: spin 2s linear infinite;
        display: none;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    .update-label {
        display: inline-block;
        margin-right: 10px;
    }

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
    $(document).ready(function() {
        $(".submit-button").click(function() {
            var form = $(this).closest('form');
            var formData = form.serialize();
            var updateButton = $("#updateButton");
            var loader = updateButton.find('.loader');

            updateButton.prop("disabled", true);
            updateButton.find(".update-label").hide();
            loader.show();

            $.ajax({
                type: "POST",
                url: form.attr("action"),
                data: formData,
                success: function(response) {
                    var trimmedResponse = $.trim(response);

                    updateButton.prop("disabled", false);
                    loader.hide();
                    updateButton.find(".update-label").show();

                    if (trimmedResponse === "success") {
                        Swal.fire({
                            title: 'Success',
                            text: 'Info Successfully Updated',
                            icon: 'success'
                        }).then(function() {
                            // Refresh the page
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            title: 'Error',
                            text: response,
                            icon: 'error'
                        });
                    }
                    $("#response").html(response);
                }
            });
        });
    });
    </script>

    <script>
    function goBack(block_id, profid) {
        var url = 'clientniche.php?locid=' + block_id + '&profid=' + profid;
        window.location.href = url;
    }


    function viewOcuppant(block_id, nicheno, profid, level) {
        var url = 'viewoccupant.php?locid=' + block_id + '&nid=' + nicheno + '&profid=' + profid + '&level=' + level;
        window.location.href = url;
    }
    </script>
    <!-- Required Jquery -->
    <script type="text/javascript" src="assets/js/jquery/jquery.min.js "></script>
    <script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js "></script>
    <script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js "></script>
    <!-- waves js -->
    <script src="assets/pages/waves/js/waves.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- slimscroll js -->
    <script src="assets/js/jquery.mCustomScrollbar.concat.min.js "></script>

    <!-- menu js -->
    <script src="assets/js/pcoded.min.js"></script>
    <script src="assets/js/vertical/vertical-layout.min.js "></script>
    <script type="text/javascript" src="assets/js/script.js "></script>

</body>

</html>