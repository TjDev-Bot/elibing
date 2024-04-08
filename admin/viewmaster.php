<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="css/walkin.css">


<?php
require('assets/component/header.php');
require('assets/component/topnavbar.php');
require('assets/component/sidebars.php');

include "../dbConn/conn.php";


if(isset($_GET['id']) && isset($_SESSION['id']) && isset($_GET['status'])){
    $profileID = $_GET['id'];
    $userID = $_SESSION['id'];
    $status1 = $_GET['status'];
    $select = "SELECT * FROM tblNiche
    INNER JOIN tblIntermentReservation ON tblNiche.Nid = tblIntermentReservation.Nid
    INNER JOIN tblDeathRecord ON tblIntermentReservation.ProfID = tblDeathRecord.ProfileID 
    INNER JOIN tblNicheLocation ON tblNiche.LocID = tblNicheLocation.LocID
    INNER JOIN tblContactInfo ON tblDeathRecord.ProfileID = tblContactInfo.ProfID WHERE ProfileID = '$profileID'";
    $query = $conn->query($select);

    while ($data = $query->fetch_assoc()) {
        $fname = $data['Fname'];
        $mname =  $data['Mname'] ;
        $lname =  $data['Lname'];
        $suffix = $data['Suffix'];
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
        $requestor = $data['Requestor'];
        $bday = $data['Birthydate'];
      
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
                                                            value="<?php echo $profileID ?> ">
                                                        <input type="hidden" name="userid"
                                                            value="<?php echo $userID?> ">
                                                        <h4 class="mb-5">Applicant's Information</h4>

                                                        <div class="formbold-mb-5 flex">
                                                            <div class="formbold-mb-5 w-full">
                                                                <label for="name" class="formbold-form-label">
                                                                    Full Name
                                                                </label>
                                                                <input type="text" name="fullname" id="name"
                                                                    value="<?php echo $requestor?>"
                                                                    class="formbold-form-input" readonly />
                                                            </div>

<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> c9be5642966b076214c66ae87a16a96449635e9f
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
                                                            <div class="formbold-mb-5 w-full formbold-px-3">
                                                                <label for="name"
                                                                    class="formbold-form-label">Relationship to the
                                                                    Deceased
                                                                </label>
                                                                <input type="email" name="relationship" id=""
                                                                    value="<?php  echo $relationship ?>"
                                                                    class="formbold-form-input" readonly />
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
                                                            <div class="formbold w-full  formbold-px-3">
                                                                <div class="formbold-mb-5 w-full">
                                                                    <label for="" class="formbold-form-label">
                                                                        Contact No
                                                                    </label>
                                                                    <input type="tel" name="contact"
                                                                        value="<?php echo $contact ?>"
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
>>>>>>> b72c3c4ba43fb1f2e4ade966189cf6b3d95c1687
>>>>>>> c9be5642966b076214c66ae87a16a96449635e9f
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
                                                            </div>
                                                        </div>


                                                        <div class="formbold-mb-5 flex">
                                                            <div class="formbold-mb-5 w-full formbold-px-3">
                                                                <label for="" class="formbold-form-label">
<<<<<<< HEAD
                                                                    Contact Number
=======
                                                                    Contact No
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
                                                                </label>
                                                                <input type="tel" name="contact" id=""
                                                                    value="<?php  echo $contact ?>"
                                                                    class="formbold-form-input" />
                                                            </div>
                                                            <div class="formbold-mb-5 w-full formbold-px-3">
                                                                <label for="name" class="formbold-form-label">
                                                                    Email Address
                                                                </label>
                                                                <input type="email" name="email" id=""
                                                                    value="<?php  echo $email ?>"
                                                                    class="formbold-form-input" />
                                                            </div>

<<<<<<< HEAD

                                                        </div>
                                                        <?php 
                                                        $select1 = "SELECT * FROM tblPayment WHERE profileID = '$profileID'";
                                                        $query1 = $conn->query($select1);
                                                        while($data1 = $query1->fetch_assoc()){
                                                            $payment = $data1['totalpayment'];
                                                            $gatepassno = $data1['gatepassno'];
                                                        }
                                                        ?>
                                                        <div class="formbold-mb-5 flex">
                                                            <div class="formbold-mb-5 w-full formbold-px-3">
                                                                <label for="" class="formbold-form-label">
                                                                    Paid
                                                                </label>
                                                                <input type="tel" name="contact" id=""
                                                                    value="<?php  echo $payment ?>"
                                                                    class="formbold-form-input" />
                                                            </div>
                                                            <div class="formbold-mb-5 w-full formbold-px-3">
                                                                <label for="name" class="formbold-form-label">
                                                                    Gatepass Number
                                                                </label>
                                                                <input type="email" name="email" id=""
                                                                    value="<?php  echo $gatepassno ?>"
                                                                    class="formbold-form-input" />
                                                            </div>


                                                        </div>
                                                        <br>
                                                        <hr>
                                                        <h4 class="mb-5">Deceased Information</h4>
                                                        <div class="formbold-mb-5 flex">
                                                            <div class="formbold-mb-5 w-full  ">
                                                                <label for="name" class="formbold-form-label"> Last
                                                                    Name
                                                                </label>
=======
                                                        </div>
                                                        <br>
                                                        <hr>
                                                        <h4 class="mb-5">Deceased Information</h4>
                                                        <div class="formbold-mb-5 flex">
                                                            <div class="formbold-mb-5 w-full  ">
                                                                <label for="name" class="formbold-form-label"> Last
                                                                    Name
                                                                </label>
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
                                                                <input type="text" name="Lname" id="name"
                                                                    value="<?php echo $lname ?>"
                                                                    class="formbold-form-input" readonly />
                                                            </div>

                                                            <div class="formbold-mb-5 w-full  formbold-px-3">
                                                                <label for="name" class="formbold-form-label"> First
                                                                    Name
                                                                </label>
                                                                <input type="text" name="Fname" id="name"
                                                                    value="<?php echo $fname ?>"
                                                                    class="formbold-form-input" readonly />
<<<<<<< HEAD
                                                            </div>

                                                            <div class="formbold-mb-5 w-full  formbold-px-3">
                                                                <label for="name" class="formbold-form-label">
                                                                    Middle Name
                                                                </label>
                                                                <input type="text" name="MName" id="name"
                                                                    value="<?php echo $mname ?>"
                                                                    class="formbold-form-input" readonly />
                                                            </div>

                                                            <div class="formbold-mb-5 w-full  formbold-px-3">
                                                                <label for="name" class="formbold-form-label">
                                                                    Suffix
                                                                </label>
                                                                <input type="text" value="<?php echo $suffix ?>"
                                                                    class="formbold-form-input" readonly>
                                                                <!-- <input type="text" name="Suffix" id="name"
                                                                        placeholder="Jr / Sr"
                                                                        class="formbold-form-input" /> -->
                                                            </div>
                                                        </div>

                                                        <div class="formbold-mb-5 flex">
                                                            <div class="formbold-mb-5 w-full formbold-px-3">
                                                                <label for="date" class="formbold-form-label">
                                                                    Date of Birth </label>
                                                                <input type="text" name="DateofDeath" id="ddate"
                                                                    value="<?php echo $bday?>"
                                                                    class="formbold-form-input" readonly />
                                                            </div>
                                                            <div class="formbold-mb-5 w-full formbold-px-3">
                                                                <label for="date" class="formbold-form-label">
                                                                    Date of Death </label>
                                                                <input type="text" name="DateofDeath" id="ddate"
                                                                    value="<?php echo $dateofdeath?>"
                                                                    class="formbold-form-input" readonly />
                                                            </div>

=======
                                                            </div>

                                                            <div class="formbold-mb-5 w-full  formbold-px-3">
                                                                <label for="name" class="formbold-form-label">
                                                                    Middle Name
                                                                </label>
                                                                <input type="text" name="MName" id="name"
                                                                    value="<?php echo $mname ?>"
                                                                    class="formbold-form-input" readonly />
                                                            </div>

                                                            <div class="formbold-mb-5 w-full  formbold-px-3">
                                                                <label for="name" class="formbold-form-label">
                                                                    Suffix
                                                                </label>
                                                                <input type="text" value="<?php echo $suffix ?>"
                                                                    class="formbold-form-input" readonly>
                                                                <!-- <input type="text" name="Suffix" id="name"
                                                                        placeholder="Jr / Sr"
                                                                        class="formbold-form-input" /> -->
                                                            </div>
                                                        </div>
                                                        <div class="formbold-mb-5 flex">
                                                            <div class="formbold-mb-5 w-full formbold-px-3">
                                                                <label for="date" class="formbold-form-label">
                                                                    Date of Death </label>
                                                                <input type="text" name="DateofDeath" id="ddate"
                                                                    value="<?php echo $bday?>"
                                                                    class="formbold-form-input" readonly />
                                                            </div>
                                                            <div class="formbold-mb-5 w-full formbold-px-3">
                                                                <label for="date" class="formbold-form-label">
                                                                    Date of Death </label>
                                                                <input type="text" name="DateofDeath" id="ddate"
                                                                    value="<?php echo $dateofdeath?>"
                                                                    class="formbold-form-input" readonly />
                                                            </div>

>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
                                                            <div class="formbold-mb-5 w-full formbold-px-3">
                                                                <label for="name" class="formbold-form-label">Cause
                                                                    of Death
                                                                </label>
                                                                <input type="text" name="CauseofDeath" id="name"
                                                                    value="<?php echo $causeofdeath ?>"
                                                                    class="formbold-form-input" readonly />
                                                            </div>

                                                            <div class="formbold-mb-5 w-full formbold-px-3">
                                                                <label for="name" class="formbold-form-label">Interment
                                                                    Place
                                                                </label>
                                                                <input type="text" name="IntermentPlace" id="name"
                                                                    value="<?php echo $intermentplace ?>"
<<<<<<< HEAD
                                                                    class="formbold-form-input" readonly />
=======
<<<<<<< HEAD
                                                                    class="formbold-form-input" readonly />
=======
<<<<<<< HEAD
                                                                    class="formbold-form-input" readonly />
=======
                                                                    class="formbold-form-input" />
                                                            </div>
                                                            <div class="formbold w-full  formbold-px-3" style="display:none;">
                                                                <label for="name" class="formbold-form-label">
                                                                    Interment Date and Time
                                                                </label>
                                                                <input type="datetime-local" name="intermentdate"
                                                                    value="<?php echo $intermentdate ?>"
                                                                    class="formbold-form-input" />

>>>>>>> b72c3c4ba43fb1f2e4ade966189cf6b3d95c1687
>>>>>>> c9be5642966b076214c66ae87a16a96449635e9f
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
                                                            </div>

                                                        </div>
                                                        <hr>

                                                        <button class="formbold-btn-next submit-button" type="button"
                                                            id="updateButton">
                                                            <span class="update-label">Update</span>
                                                            <div class="loader"></div>
                                                        </button>
                                                        <div id="response"></div>


                                                        <!-- Ayaw i sulod diri ang pull out button -->
                                                    </form>
                                                    <form action="../dbConn/pull.php" method="POST">
                                                        <input type="hidden" name="profid"
                                                            value="<?php echo $profileID ?> ">
                                                        <input type="hidden" name="userid"
                                                            value="<?php echo $userID?> ">
                                                        <?php if($status1 != 5){ ?>
                                                        <div class="fomrbold-btn-next">
                                                            <button class="btn btn-danger submit-button1" type="button"
                                                                id="pullButton"><span class="update-label">Pull -
                                                                    Out</span>
                                                                <div class="loader"></div>
                                                            </button>
                                                        </div>
                                                        <?php } ?>

                                                        <div id="response"></div>

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

                    updateButton.prop("disabled", false);
                    loader.hide();
                    updateButton.find(".update-label").show();

                    if (trimmedResponse === "success") {
                        Swal.fire({
                            title: 'Success',
                            text: 'Info Successfully Updated',
                            icon: 'success'
                        }).then(function() {
                            window.location.href = 'deceased.php';
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


    $(document).ready(function() {
        $(".submit-button1").click(function() {
            var form = $(this).closest('form');
            var formData = form.serialize();
            var updateButton = $("#pullButton");
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
                            text: 'Deceased Successfully Pull - Out',
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