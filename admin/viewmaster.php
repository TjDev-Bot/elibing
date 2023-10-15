<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="css/walkin.css">


<?php
require('assets/component/header.php');
require('assets/component/topnavbar.php');
require('assets/component/sidebars.php');

include "../dbConn/conn.php";


if(isset($_GET['id'])){
    $profileID = $_GET['id'];

    $select = "SELECT * FROM tblNiche
    INNER JOIN tblIntermentReservation ON tblNiche.Nid = tblIntermentReservation.Nid
    INNER JOIN tblDeathRecord ON tblIntermentReservation.ProfID = tblDeathRecord.ProfileID 
    INNER JOIN tblNicheLocation ON tblNiche.LocID = tblNicheLocation.LocID
    INNER JOIN tblContactInfo ON tblDeathRecord.ProfileID = tblContactInfo.ProfID WHERE ProfileID = '$profileID'";
    $query = $conn->query($select);

    while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
        $fname = $data['Fname'];
        $mname =  $data['MName'] ;
        $lname =  $data['Lname'];
        $locID = $data['LocID'];
        $nicheno = $data['Nid'];
        $level = $data['Level'];
        $type = $data['Type'];
        $contact = $data['ContactNo'];
        $email = $data['Email'];
        $dateofdeath = $data['DateofDeath'];
        $causeofdeath = $data['CauseofDeath'];
        $intermentplace = $data['IntermentPlace'];
        $relationship = $data['Relationship'];
        $intermentdate = $data['IntermentDateTime'];
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
                            <h1>Update Info</h1>
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
                                                    <button class="btn btn-danger" type="button" name="submit"
                                                        onclick="goBack()">Back</button>
                                                    <p>

                                                    <form action="../dbConn/updatecontact.php" method="POST">
                                                        <input type="hidden" name="profid"
                                                            value="<?php echo $profileID ?>">
                                                        <div class="formbold flex">
                                                            <div class="formbold-mb-5 w-full  formbold-px-3">
                                                                <label for="name" class="formbold-form-label"></label>
                                                                Relationship
                                                                </label>
                                                                <input type="text" name="relationship"
                                                                    value="<?php echo  $relationship ?>"
                                                                    class="formbold-form-input" />
                                                            </div>

                                                            <div class="formbold w-full  formbold-px-3">
                                                                <div class="formbold-mb-5 w-full">
                                                                    <label for="" class="formbold-form-label">
                                                                        Contact No
                                                                    </label>
                                                                    <input type="tel" name="contact"
                                                                        value="<?php echo $contact ?>"
                                                                        placeholder="Please enter a valid Philippine phone number with 63 and 10 digits."
                                                                        class="formbold-form-input"
                                                                        pattern="^\63\d{10}$"
                                                                        title="Please enter a valid Philippine phone number with 63 and 10 digits." />
                                                                </div>

                                                            </div>
                                                            <div class="formbold w-full  formbold-px-3">
                                                                <label for="date" class="formbold-form-label">
                                                                    Email</label>
                                                                <input type="email" name="email"
                                                                    value="<?php echo $email ?>"
                                                                    class="formbold-form-input" />
                                                            </div>
                                                        </div>
                                                        <div class="formbold-mb-5 flex">
                                                            <div class="formbold w-full  formbold-px-3">
                                                                <label for="name" class="formbold-form-label"></label>
                                                                First name
                                                                </label>
                                                                <input type="text" name="fname"
                                                                    value="<?php echo $fname ?>"
                                                                    class="formbold-form-input" />
                                                            </div>

                                                            <div class="formbold w-full  formbold-px-3">
                                                                <label for="name" class="formbold-form-label"></label>
                                                                Middle Name
                                                                </label>
                                                                <input type="text" name="mname"
                                                                    value="<?php echo $mname ?>"
                                                                    class="formbold-form-input" />
                                                            </div>
                                                            <div class="formbold w-full  formbold-px-3">
                                                                <label for="name" class="formbold-form-label"></label>
                                                                Last Name
                                                                </label>
                                                                <input type="text" name="lname"
                                                                    value="<?php echo $lname ?>"
                                                                    class="formbold-form-input" />
                                                            </div>


                                                        </div>
                                                        <div class="formbold-mb-5 flex">
                                                            <div class="formbold w-full  formbold-px-3">
                                                                <label for="name" class="formbold-form-label">Cause of
                                                                    Death
                                                                </label>
                                                                <input type="text" name="causeofdeath"
                                                                    value="<?php echo $causeofdeath ?>"
                                                                    class="formbold-form-input" />
                                                            </div>

                                                            <div class="formbold w-full  formbold-px-3">
                                                                <label for="name" class="formbold-form-label">Interment
                                                                    Place
                                                                </label>
                                                                <input type="text" name="intermentplace"
                                                                    value="<?php echo $intermentplace ?>"
                                                                    class="formbold-form-input" />
                                                            </div>
                                                            <div class="formbold w-full  formbold-px-3">
                                                                <label for="name" class="formbold-form-label">
                                                                    Interment Date and Time
                                                                </label>
                                                                <input type="datetime-local" name="intermentdate"
                                                                    value="<?php echo $intermentdate ?>"
                                                                    class="formbold-form-input" />

                                                            </div>

                                                        </div>
                                                        <hr>
                                                        <button class="formbold-btn-next submit-button" type="button"
                                                            data-bs-target="#exampleModal" id="updateButton">
                                                            <span class="update-label">Update</span>
                                                            <div class="loader"></div>
                                                        </button>


                                                    </form>
                                                    <div id="response"></div>

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

                    // Re-enable the button and hide the loader, show the label
                    updateButton.prop("disabled", false);
                    loader.hide();
                    updateButton.find(".update-label").show();

                    if (trimmedResponse === "success") {
                        Swal.fire({
                            title: 'Success',
                            text: 'Info Successfully Updated',
                            icon: 'success'
                        }).then(function() {
                            window.location.href = '../admin/deceased.php';
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

    function goBack() {
        window.history.back();
    }
    </script>



    <?php
    require('assets/component/script.php');
    ?>

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
</body>

</html>