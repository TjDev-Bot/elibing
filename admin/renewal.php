<?php session_start() ?>




<!DOCTYPE html>
<html lang="en">
<?php
require('assets/component/header.php');
require('assets/component/topnavbar.php');
require('assets/component/sidebars.php');
include "../dbConn/conn.php";

$userID = $_SESSION['id'];
?>
<link rel="stylesheet" href="css/walkin.css">
<<<<<<< HEAD
=======

<body>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">
                            <h1>Renewal</h1>
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
                                                        <?php
                                                            if(isset($_GET['id'])){
                                                                $id = $_GET['id'];
                                                            }
                                                            $select = "SELECT * FROM tblNiche
                                                            INNER JOIN tblIntermentReservation ON tblNiche.Nid = tblIntermentReservation.Nid
                                                            INNER JOIN tblDeathRecord ON tblIntermentReservation.ProfID = tblDeathRecord.ProfileID 
                                                            INNER JOIN tblNicheLocation ON tblNiche.LocID = tblNicheLocation.LocID
                                                            INNER JOIN tblContactInfo ON tblDeathRecord.ProfileID = tblContactInfo.ProfID
                                                            INNER JOIN tblBuriedRecord ON tblNiche.Nid = tblBuriedRecord.Nid WHERE tblBuriedRecord.OccupancyDate IS NOT NULL";
                                                            $query = $conn->query($select);

                                                            while($data = $query->fetch_assoc()){
                                                                $relationship = $data['Relationship'];
                                                                $name = $data['Fname'].' '.$data['Mname'].' '.$data['Lname'];
                                                                $dateofdeath = $data['DateofDeath'];
                                                                $occupancydate = $data['OccupancyDate'];
                                                                $req = $data['Requestor'];
                                                            }
                                                        ?>

                                                        <?php 
                                                        $select1 = "SELECT * FROM tblPayment WHERE profileID = '$id'";
                                                        $query1 = $conn->query($select1);
                                                        while($data1 = $query1->fetch_assoc()){
                                                            $payment = $data1['totalpayment'];
                                                            $gatepassno = $data1['gatepassno'];
                                                            $currentdate =$data1['currentdate'];
                                                        }
                                                        ?>



                                                        <form action="../dbConn/renewadmin.php" method="POST">
                                                            <input type="hidden" name="req" value="<?php echo $req ?>">
                                                            <input type="hidden" name="userid"
                                                                value="<?php echo $userID ?>">
                                                            <input type="hidden" name="gatepass" id="name"
                                                                value="<?php echo $gatepassno ?>" required
                                                                class="formbold-form-input" readonly />
                                                            <input type="hidden" name="profid" value="<?php echo $id?>">
                                                            <div class="formbold-mb-5 flex">
                                                                <div class="formbold-mb-5 w-full">
                                                                    <label for="name"
                                                                        class="formbold-form-label">Relationship
                                                                        to the Deceased</label>
                                                                    <input type="text" name="relationship" id="name"
                                                                        value="<?php echo ucfirst($relationship) ?>"
                                                                        readonly class="formbold-form-input" />
                                                                </div>
                                                                <div class="formbold-mb-5 w-full  formbold-px-3">
                                                                    <label for="name" class="formbold-form-label"> Name
                                                                        of the Deceased</label>
                                                                    <input type="text" name="deceased" id="name"
                                                                        value="<?php echo ucwords($name)?>" readonly
                                                                        class="formbold-form-input" />
                                                                </div>
                                                            </div>
                                                            <div class="formbold-mb-5 flex">
                                                                <div class="formbold-mb-5 w-full">
                                                                    <label for="date" class="formbold-form-label">Date
                                                                        of Death</label>
                                                                    <input type="text" name="deathdate" id="ddate"
                                                                        value="<?php echo $dateofdeath ?>" readonly
                                                                        class="formbold-form-input" />
                                                                </div>
<<<<<<< HEAD
                                                                <div class="formbold-mb-5 w-full  formbold-px-3">
=======
                                                                <div class="formbold-mb-5 w-full">
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
                                                                    <label for="date"
                                                                        class="formbold-form-label">Occupancy
                                                                        Date</label>
                                                                    <input type="text" name="interment" id="ddate"
                                                                        value="<?php echo $occupancydate ?>" readonly
                                                                        class="formbold-form-input" />
                                                                </div>
                                                                <div class="formbold-mb-5 w-full">
<<<<<<< HEAD
                                                                    <label for="date"
                                                                        class="formbold-form-label">Apartment
                                                                        Type</label>
                                                                    <select name="type" id="occupancySelect"
                                                                        class="formbold-form-input">
                                                                        <option value="">Select Type</option>
                                                                        <option value="2">Individual Chamber</option>
                                                                        <option value="3">Re - Interment</option>
=======
                                                                    <label for="date" class="formbold-form-label">Renew
                                                                        Occupancy</label>
                                                                    <select name="occupancy" id="occupancySelect"
                                                                        class="formbold-form-input">
                                                                        <option value="">Select Renewal Period</option>
                                                                        <option value="1">1 Month</option>
                                                                        <option value="2">2 Months</option>
                                                                        <option value="3">3 Months</option>
                                                                        <option value="4">4 Months</option>
                                                                        <option value="5">5 Months</option>
                                                                        <option value="6">6 Months</option>
                                                                        <option value="7">7 Months</option>
                                                                        <option value="8">8 Months</option>
                                                                        <option value="9">9 Months</option>
                                                                        <option value="10">10 Months</option>
                                                                        <option value="11">11 Months</option>
                                                                        <option value="12">12 Months</option>

>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
                                                                    </select>
                                                                </div>



                                                            </div>
                                                            <div class="formbold-mb-5 w-full">
                                                                <label for="date" class="formbold-form-label">Past
                                                                    Payment</label>

                                                            </div>
                                                            <?php 
                                                                $select1 = "SELECT * FROM tblPayment WHERE profileID = '$id' ORDER BY currentdate DESC";
                                                                $query1 = $conn->query($select1);
                                                                while($data1 = $query1->fetch_assoc()){
                                                                  
                                                                    $currentdate =$data1['currentdate'];
                                                                
                                                            ?>
                                                            <?php if(isset($currentdate)) { ?>
                                                            <div class="formbold-mb-5 w-full formbold-form-input">

                                                                <td>
                                                                    <?php echo $currentdate ?>
                                                                </td>
                                                            </div>
                                                            <?php } } ?>


                                                            <div class="formbold-mb-5 w-full">
                                                                <label for="date" class="formbold-form-label">Renewal
                                                                    Amount</label>
                                                                <input type="text" value="1,000" name="amount"
                                                                    id="ddate" readonly class="formbold-form-input" />
                                                            </div>
                                                            <hr>
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> b72c3c4ba43fb1f2e4ade966189cf6b3d95c1687

<body>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">
                            <h1>Add Walk-in Renewal</h1>
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
                                                        <?php
                                                            if(isset($_GET['id'])){
                                                                $id = $_GET['id'];
                                                            }
                                                            $select = "SELECT * FROM tblNiche
                                                            INNER JOIN tblIntermentReservation ON tblNiche.Nid = tblIntermentReservation.Nid
                                                            INNER JOIN tblDeathRecord ON tblIntermentReservation.ProfID = tblDeathRecord.ProfileID 
                                                            INNER JOIN tblNicheLocation ON tblNiche.LocID = tblNicheLocation.LocID
                                                            INNER JOIN tblContactInfo ON tblDeathRecord.ProfileID = tblContactInfo.ProfID
                                                            INNER JOIN tblBuriedRecord ON tblNiche.Nid = tblBuriedRecord.Nid WHERE tblBuriedRecord.OccupancyDate IS NOT NULL";
                                                            $query = $conn->query($select);

<<<<<<< HEAD
                                                            while($data = $query->fetch(PDO::FETCH_ASSOC)){
                                                                $relationship = $data['Relationship'];
                                                                $name = $data['Fname'].' '.$data['MName'].' '.$data['Lname'];
                                                                $dateofdeath = $data['DateofDeath'];
                                                                $occupancydate = $data['OccupancyDate'];
                                                            }
                                                        ?>
                                                        <form action="../dbConn/renewadmin.php" method="POST">
                                                            <input type="hidden" name="profid" value="<?php echo $id?>">
                                                            <div class="formbold-mb-5 flex">
                                                                <div class="formbold-mb-5 w-full">
                                                                    <label for="name"
                                                                        class="formbold-form-label">Relationship
                                                                        to the Deceased</label>
                                                                    <input type="text" name="relationship" id="name"
                                                                        value="<?php echo ucfirst($relationship) ?>"
                                                                        readonly class="formbold-form-input" />
                                                                </div>
                                                                <div class="formbold-mb-5 w-full">
                                                                    <label for="name" class="formbold-form-label"> Name
                                                                        of the Deceased</label>
                                                                    <input type="text" name="deceased" id="name"
                                                                        value="<?php echo ucwords($name)?>" readonly
                                                                        class="formbold-form-input" />
                                                                </div>
                                                            </div>
                                                            <div class="formbold-mb-5 flex">
                                                                <div class="formbold-mb-5 w-full">
                                                                    <label for="date" class="formbold-form-label">Date
                                                                        of Death</label>
                                                                    <input type="text" name="deathdate" id="ddate"
                                                                        value="<?php echo $dateofdeath ?>" readonly
                                                                        class="formbold-form-input" />
                                                                </div>
                                                                <div class="formbold-mb-5 w-full">
                                                                    <label for="date"
                                                                        class="formbold-form-label">Occupancy
                                                                        Date</label>
                                                                    <input type="text" name="interment" id="ddate"
                                                                        value="<?php echo $occupancydate ?>" readonly
                                                                        class="formbold-form-input" />
                                                                </div>
                                                                <div class="formbold-mb-5 w-full">
                                                                    <label for="date" class="formbold-form-label">Renew
                                                                        Occupancy</label>
                                                                    <select name="occupancy" id="occupancySelect"
                                                                        class="formbold-form-input">
                                                                        <option value="">Select Renewal Period</option>
                                                                        <option value="1">1 Month</option>
                                                                        <option value="2">2 Months</option>
                                                                        <option value="3">3 Months</option>
                                                                        <option value="4">4 Months</option>
                                                                        <option value="5">5 Months</option>
                                                                        <option value="6">6 Months</option>
                                                                        <option value="7">7 Months</option>
                                                                        <option value="8">8 Months</option>
                                                                        <option value="9">9 Months</option>
                                                                        <option value="10">10 Months</option>
                                                                        <option value="11">11 Months</option>
                                                                        <option value="12">12 Months</option>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <hr>
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
                                                            <div>
                                                                <button class="btn btn-success submit-button mb-3"
                                                                    type="button" id="updateButton" disabled>
                                                                    <span class="update-label">Renew</span>
                                                                    <div class="loader"></div>
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div style="display:none;" id="response"></div>
<<<<<<< HEAD
=======
=======
>>>>>>> c9be5642966b076214c66ae87a16a96449635e9f
                                                            <div>
                                                                <button class="btn btn-success submit-button mb-3"
                                                                    type="button" id="updateButton" disabled>
                                                                    <span class="update-label">Renew</span>
                                                                    <div class="loader"></div>
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div style="display:none;" id="response"></div>
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
                            </div>
                        </div>
                    </div>
                </div>
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======



>>>>>>> b72c3c4ba43fb1f2e4ade966189cf6b3d95c1687
>>>>>>> c9be5642966b076214c66ae87a16a96449635e9f
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
            </main>
        </div>
    </div>

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
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> c9be5642966b076214c66ae87a16a96449635e9f
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
        $("#occupancySelect").change(function() {
            var selectedOption = $(this).val();
            if (selectedOption !== "") {
                $("#updateButton").prop("disabled", false);
            } else {
                $("#updateButton").prop("disabled", true);
            }
        });
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
>>>>>>> b72c3c4ba43fb1f2e4ade966189cf6b3d95c1687
>>>>>>> c9be5642966b076214c66ae87a16a96449635e9f
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
        $(".submit-button").click(function() {
            var form = $(this).closest('form');
            var formData = form.serialize();
            var updateButton = $("#updateButton");
            var loader = updateButton.find('.loader');
<<<<<<< HEAD
            updateButton.prop("disabled", true);
            updateButton.find(".update-label").hide();
            loader.show();
=======
<<<<<<< HEAD
            updateButton.prop("disabled", true);
            updateButton.find(".update-label").hide();
            loader.show();
=======
<<<<<<< HEAD
            updateButton.prop("disabled", true);
            updateButton.find(".update-label").hide();
            loader.show();
=======

            updateButton.prop("disabled", true);
            updateButton.find(".update-label").hide();
            loader.show();

>>>>>>> b72c3c4ba43fb1f2e4ade966189cf6b3d95c1687
>>>>>>> c9be5642966b076214c66ae87a16a96449635e9f
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
            $.ajax({
                type: "POST",
                url: form.attr("action"),
                data: formData,
                success: function(response) {
                    var trimmedResponse = $.trim(response);
<<<<<<< HEAD
                    updateButton.prop("disabled", false);
                    loader.hide();
                    updateButton.find(".update-label").show();
=======
<<<<<<< HEAD
                    updateButton.prop("disabled", false);
                    loader.hide();
                    updateButton.find(".update-label").show();
=======
<<<<<<< HEAD
                    updateButton.prop("disabled", false);
                    loader.hide();
                    updateButton.find(".update-label").show();
=======

                    updateButton.prop("disabled", false);
                    loader.hide();
                    updateButton.find(".update-label").show();

>>>>>>> b72c3c4ba43fb1f2e4ade966189cf6b3d95c1687
>>>>>>> c9be5642966b076214c66ae87a16a96449635e9f
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
                    if (trimmedResponse === "success") {
                        Swal.fire({
                            title: 'Success',
                            text: 'Info Successfully Updated',
                            icon: 'success'
                        }).then(function() {
<<<<<<< HEAD
=======
<<<<<<< HEAD
                            window.location = "orderpayment.php";
=======
<<<<<<< HEAD
                            window.location = "orderpayment.php";
=======
                            // Refresh the page
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
                            window.location = "deceased.php";
>>>>>>> b72c3c4ba43fb1f2e4ade966189cf6b3d95c1687
>>>>>>> c9be5642966b076214c66ae87a16a96449635e9f
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
    <?php
require('assets/component/script.php');
?>
</body>

</html>