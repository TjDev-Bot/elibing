<?php
    include('../dbConn/conn.php');
?>

<body>
    <nav class="pcoded-navbar">
        <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
        <div class="pcoded-inner-navbar main-menu">
            <div class="">
                <div class="main-menu-header">
                    <?php
                            $userId = $_SESSION['id'];

                            $select = "SELECT * FROM users WHERE id = '$userId'";
                            $selectResult = mysqli_query($conn, $select);

                            while($row = mysqli_fetch_assoc($selectResult)){
                                $fullname = $row['firstname'].' '.$row['midname'].' '.$row['lastname'];
                            }
                        ?>
                    <!-- <img class="img-80 img-radius" src="assets/images/avatar-4.jpg" alt="User-Profile-Image"> -->
                    <div class="user-details">
                        <span id="more-details"><?php echo $fullname ?><i class="fa fa-caret-down"></i></span>
                    </div>
                </div>
                <div class="main-menu-content">
                    <ul>
                        <li class="more-details">
                            <a href="#!" data-toggle="modal"
                                    data-target="#exampleModal"><i class="ti-settings"></i>Settings</a>
                            <a href="auth-normal-sign-in.html"><i class="ti-layout-sidebar-left"
                                    href="../dbConn/logout.php"></i>Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="pcoded-navigation-label">Navigation</div>
            <ul class="pcoded-item pcoded-left-item">
                <li class="">
                    <a href="index.php" class="waves-effect waves-dark ">
                        <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                        <span class="pcoded-mtext">Dashboard</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
            </ul>
            <div class="pcoded-navigation-label">Forms</div>
            <ul class="pcoded-item pcoded-left-item">
                <li class="">
                    <a href="appointment.php" class="waves-effect waves-dark ">
                        <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                        <span class="pcoded-mtext">Appointment</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
                <li class="">
                    <a href="renewal.php" class="waves-effect waves-dark ">
                        <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                        <span class="pcoded-mtext">Renewal</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
                <li class="">
                    <a href="#" class="waves-effect waves-dark ">
                        <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                        <span class="pcoded-mtext">Location</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
                <li class="">
                    <a href="#" class="waves-effect waves-dark ">
                        <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                        <span class="pcoded-mtext">Live</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
            </ul>



        </div>
    </nav>

    <!-- Modal -->
    <?php
    
    $userId = $_SESSION['id'];

    $sql = "SELECT * FROM users WHERE id = $userId";
    $query = mysqli_query($conn, $sql);
       
    while($row = mysqli_fetch_assoc($query)){
        $fullname = $row['firstname'].' '.$row['midname'].' '.$row['lastname'];
        $address = $row['address'];
        $email = $row['email'];
        $contactno = $row['contactno'];
        $password = $row['password'];

        if (isset($_POST['update'])) {
            $firstname = $_POST['firstname'];
            $midname = $_POST['midname'];
            $lastname = $_POST['lastname'];
            $address = $_POST['address'];
            $email = $_POST['email'];
            $contactno = $_POST['contactno'];
            $newpassword = $_POST['newpassword'];
    
            // Conditionally include newpassword in the UPDATE query if it's not empty
            $passwordUpdate = !empty($newpassword) ? ", password = '$newpassword'" : "";
    
            $updateQuery = "UPDATE users SET firstname = '$firstname', midname = '$midname', lastname = '$lastname', address = '$address', email = '$email', contactno = '$contactno' $passwordUpdate WHERE id = '$userId'";
            $updateResult = mysqli_query($conn, $updateQuery);
    
            if ($updateResult) {
                echo "<script>if(confirm('Profile updated successfully')){document.location.href='index.php'};</script>";
                exit();
            } else {
                die("QUERY FAILED" . mysqli_error($conn));
            }
    }
?>

    <!-- Profile Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Settings</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="settings-container">

                        <div class="left-settings">
                            <!-- <div class="settings-avatar">
                            <img src="../images/seal.jpg" alt="">
                        </div> -->
                            <div class="toggle-settings">
                                <i class='bx bx-edit-alt' id="edit-button"></i>
                            </div>

                            <div class="settings-info" id="settings-info-name">
                                <h4><?php echo $fullname; ?></h4>

                            </div>
                            <div class="settings-info">
                                <h4><?php echo $email; ?></h4>

                            </div>
                            <div class="settings-info">
                                <h4><?php echo $address; ?></h4>

                            </div>
                            <div class="settings-info">
                                <h4><?php echo $contactno; ?></h4>
                            </div>
                        </div>


                        <div class="settings-right">
                            <form action="" method="POST">
                                <div class="form-group-settings">
                                    <div class="row">
                                        <!-- <div class="col">
                                        <label for="lname">Attach Image</label>
                                        <input type="file" name="profile" class="form-control-login" required>
                                    </div> -->
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="lname">Last name</label>
                                            <input type="text" name="lastname" class="form-control-login"
                                                value="<?php echo $row['lastname'] ?>" required>
                                        </div>
                                        <div class="col">
                                            <label for="fname">First name</label>
                                            <input type="text" name="firstname" class="form-control-login"
                                                value="<?php echo $row['firstname']  ?>" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="mname">Middle name</label>
                                            <input type="text" name="midname" class="form-control-login"
                                                value="<?php echo $row['midname'] ?>" required>
                                        </div>

                                        <div class="col">
                                            <label for="address">Address</label>
                                            <input type="text" name="address" class="form-control-login"
                                                value="<?php echo $address ?>" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" class="form-control-login"
                                                value="<?php echo $email ?>" required>
                                        </div>

                                        <div class="col">
                                            <label for="contact">Contact No.</label>
                                            <input type="text" name="contactno" class="form-control-login"
                                                value="<?php echo $contactno ?>" required>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <label for="password">Old Password</label>
                                            <input type="password" name="password" id="password"
                                                class="form-control-login " value="<?php echo $password ?>" required>
                                            <i class='bx bx-hide' id="password-toggle-icon"></i>

                                        </div>

                                        <div class="col">
                                            <label for="conpassword">New Password</label>
                                            <input type="password" name="newpassword" class="form-control-login"
                                                >
                                            <i class='bx bx-hide' id="new-password-toggle-icon"></i>

                                        </div>



                                    </div>
                                    <div class="button-settings">
                                        <button type="button" class="btn btn-danger" id="discard-button"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary save-button"
                                            name="update">Save</button>
                                    </div>
                                </div>
                            </form>


                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>

    <?php } ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        // Initial state: Editing is disabled
        var editingEnabled = false;

        // Function to toggle editing state
        function toggleEditing() {
            editingEnabled = !editingEnabled;
            if (editingEnabled) {
                // When editing is enabled
                $('#discard-button').text('Discard');
                $("#edit-button").text("Editing");
                $(".form-control-login").removeAttr("readonly");
                // Add a class to the Save button to change its appearance
                $(".save-button").removeClass("disabled-button");
            } else {
                // When editing is disabled
                $('#discard-button').text('Close');
                $("#edit-button").text("Edit");
                $(".form-control-login").attr("readonly", "readonly");
                // Add a class to the Save button to change its appearance
                $(".save-button").addClass("disabled-button");
            }
        }

        // Toggle editing on "Edit" button click
        $("#edit-button").click(function() {
            toggleEditing();
        });

        // Initialize the form's editing state
        toggleEditing();



    });

    const togglePassword = document.querySelector("#password-toggle-icon");
    const password = document.querySelect("#password");

    togglePassword.addEventListener("click", function() {
        const type = password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);

        this.classList.toggle("bx-show");
    });
    </script>
</body>