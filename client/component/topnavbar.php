<?php
    session_start();
    include('../dbConn/conn.php');
?>

<nav class="navbar header-navbar pcoded-header">
    <div class="navbar-wrapper">
        <div class="navbar-logo">
            <a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="#!">
                <i class="ti-menu"></i>
            </a>

            <!--Logo for E-libing -->
            <a href="index.php">
                <img class="img-fluid" src="" alt="Theme-Logo" />
            </a>
            <a class="mobile-options waves-effect waves-light">
                <i class="ti-more"></i>
            </a>
        </div>
        <div class="navbar-container container-fluid">
            <ul class="nav-left">
                <li>
                    <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                </li>

            </ul>
            <ul class="nav-right">
                <li class="header-notification">
                    <a href="#!" class="waves-effect waves-light">
                        <i class="ti-bell"></i>
                        <span class="badge bg-c-red"></span>
                    </a>
                    <ul class="show-notification">
                        <li>
                            <h6>Notifications</h6>
                            <label class="label label-danger">New</label>
                        </li>
                        <li class="waves-effect waves-light">
                            <div class="media">
                                <div class="media-body">
                                    <h5 class="notification-user">John Doe</h5>
                                    <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                    <span class="notification-time">30 minutes ago</span>
                                </div>
                            </div>
                        </li>
                        <li class="waves-effect waves-light">
                            <div class="media">

                                <div class="media-body">
                                    <h5 class="notification-user">Joseph William</h5>
                                    <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                    <span class="notification-time">30 minutes ago</span>
                                </div>
                            </div>
                        </li>
                        <li class="waves-effect waves-light">
                            <div class="media">

                                <div class="media-body">
                                    <h5 class="notification-user">Sara Soudein</h5>
                                    <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                    <span class="notification-time">30 minutes ago</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="user-profile header-notification">
                    <a href="#!" class="waves-effect waves-light">
                        <?php
                            $userId = $_SESSION['id'];

                            $select = "SELECT * FROM users WHERE id = '$userId'";
                            $selectResult = mysqli_query($conn, $select);

                            while($row = mysqli_fetch_assoc($selectResult)){
                                $fullname = $row['firstname'].' '.$row['midname'].' '.$row['lastname'];
                            }
                        ?>
                        <span class="span-name"><?php echo $fullname ?></span>
                        <i class="ti-angle-down"></i>
                    </a>
                    <ul class="show-notification profile-notification">
                        <li class="waves-effect waves-light">
                            <a href="#!" data-toggle="modal" data-target="#exampleModal">
                                <i class="ti-settings"></i> Settings
                            </a>
                        </li>
                        <li class="waves-effect waves-light">
                            <a href="../dbConn/logout.php"><i class="ti-layout-sidebar-left"></i>Logout</a>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
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
                        <!-- <div class="toggle-settings">
                            <i class='bx bx-edit-alt' id="edit-button"></i>
                        </div> -->

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
                                        <input type="password" name="password" id="password" class="form-control-login "
                                            value="<?php echo $password ?>" required>
                                        <i class='bx bx-hide' id="password-toggle-icon"></i>

                                    </div>

                                    <div class="col">
                                        <label for="conpassword">New Password</label>
                                        <input type="password" name="newpassword" class="form-control-login">
                                        <i class='bx bx-hide' id="new-password-toggle-icon"></i>

                                    </div>



                                </div>
                                <div class="button-settings">
                                    <button type="button" class="btn btn-danger" id="discard-button"
                                        data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" id="save-button"
                                        name="update">Save</button>
                                    <button type="button" class="btn btn-primary" id="edit-button">Edit</button>
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
            $('#discard-button').text('Close').hide();
            $("#edit-button").text("Edit");
            $(".form-control-login").attr("readonly", "readonly");
            // Hide the Save button
            $("#save-button").hide();
        } else {
            // When editing is disabled
            $('#discard-button').text('Discard').show();
            $("#edit-button").text("Editing").hide();
            $(".form-control-login").removeAttr("readonly");
            // Show the Save button
            $("#save-button").show();
           
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