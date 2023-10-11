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

                            $select = "SELECT * FROM tblUsersLogin WHERE UserID = '$userId'";
                            $selectResult = $conn->query($select);

                            while($row = $selectResult->fetch(PDO::FETCH_ASSOC)){
                                $fullname = $row['Createdby'];
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
try {
    $userId = $_SESSION['id'];

    $sql = "SELECT * FROM tblUsersLogin WHERE UserID = '$userId'";
    $query = $conn->query($sql);

    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        $fullname = $row['Createdby'];
        $email = $row['username'];
        $password = $row['pw'];

        if (isset($_POST['update'])) {
            $name = $_POST['name'];
            $address = $_POST['address'];
            $email = $_POST['email'];
            $newpassword = $_POST['newpassword'];

            // Create the update query with conditional password update
            $updateQuery = "UPDATE tblUsersLogin SET Createdby = :name, username = :email";
            
            // Conditionally include password update in the query
            if (!empty($newpassword)) {
                $updateQuery .= ", pw = :newpassword";
            }

            $updateQuery .= " WHERE UserID = :userId";
            
            $stmt = $conn->prepare($updateQuery);
            
            // Bind parameters
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);

            // Conditionally bind newpassword parameter if not empty
            if (!empty($newpassword)) {
                $stmt->bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
            }

            $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);

            // Execute the update query
            $updateResult = $stmt->execute();

            if ($updateResult) {
                echo "<script>if(confirm('Profile updated successfully')){document.location.href='index.php'};</script>";
                exit();
            } else {
                die("QUERY FAILED" . mysqli_error($conn));
            }
        }
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
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
                                        <label for="mname">Full name</label>
                                        <input type="text" name="name" class="form-control-login"
                                            value="<?php echo $fullname ?>" required>
                                    </div>

                                    <div class="col">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control-login"
                                            value="<?php echo $email ?>" required>
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