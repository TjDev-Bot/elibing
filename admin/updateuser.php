<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="css/walkin.css">


<?php
require('assets/component/header.php');
require('assets/component/topnavbar.php');
require('assets/component/sidebars.php');
include "../dbConn/conn.php";

if(isset($_GET['userID'])){
    $userID = $_GET['userID'];

    
$selectreserve = "SELECT * FROM  tblUsersLogin WHERE UserID = '$userID'";
$queryreserve = $conn->query($selectreserve);
while ($dataloc = $queryreserve->fetch(PDO::FETCH_ASSOC)) {
    $email = $dataloc['username'];
    $pw = $dataloc['pw'];
    $createdby = $dataloc['Createdby'];
    $role = $dataloc['Restriction'];
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

                                                <form action="../dbConn/updateuser.php" method="POST">
                                                    <input type="hidden" name="userid" value="<?php echo $userID ?>">
                                                    <div class="formbold-main">
                                                        <button class="btn btn-danger" type="button" name="submit"
                                                            onclick="goBack()">Back</button>
                                                        <p>


                                                        <div class="formbold-mb-5 flex">
                                                            <div class="formbold-mb-5">
                                                                <label>
                                                                    Full Name
                                                                </label>
                                                                <input type="text" name="fullname" id="inputFields"
                                                                    value="<?php echo $createdby ?>"
                                                                    placeholder="Enter Full Name" required
                                                                    class="formbold-form-input" />
                                                            </div>
                                                            <div class="formbold-mb-5">
                                                                <label>Email
                                                                </label>
                                                                <input type="text" name="email" id="inputFields"
                                                                    value="<?php echo $email ?>"
                                                                    placeholder="Enter email for login"
                                                                    required="required" class="formbold-form-input" />
                                                            </div>
                                                        </div>

                                                        <div class="formbold-mb-5 flex">
                                                            <div class="formbold-mb-5">
                                                                <label>
                                                                    Password
                                                                </label>
                                                                <input type="password" name="pw" id="inputFields"
                                                                    value="<?php echo $password ?>"
                                                                    placeholder="Enter Password"
                                                                    class="formbold-form-input" />
                                                            </div>
                                                            <div id="inputFields">
                                                                <label>
                                                                    User Role (<?php echo $role ?>)
                                                                </label>
                                                                <select class="formbold-form-label" name="role" id="">
                                                                    <option value="<?php echo $role; ?>" selected>
                                                                        <?php echo $role; ?></option>

                                                                    <?php
                                                                        $roles = array(
                                                                            'Head (Admin)' => 'E-Libing Admin',
                                                                            'Staff' => 'E-Libing Staff',
                                                                            'ACAMP site' => 'E-Libing ACAMP Site'
                                                                        );

                                                                        foreach ($roles as $label => $value) {
                                                                            echo '<option value="' . $value . '">' . $label . '</option>';
                                                                        }
                                                                    ?>
                                                                </select>
                                                            </div>

                                                        </div>
                                                        <button class="formbold-btn-next submit-button" type="button"
                                                            id="updateButton">
                                                            <span class="update-label">Update</span>
                                                            <div class="loader"></div>
                                                        </button>

                                                        <div id="response"></div>

                                                    </div>
                                            </div>
                                            </form>
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
                            window.location.href = '../admin/user.php';
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