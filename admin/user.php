<?php 
session_start();
include('../dbConn/conn.php');
$userID = isset($_SESSION['id']) ? $_SESSION['id'] : ''; 

?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="css/walkin.css">

<?php
require('assets/component/header.php');
require('assets/component/topnavbar.php');
require('assets/component/sidebars.php');
require('assets/component/script.php');

?>

<body>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">

                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">
                            <h1>Add Users</h1>
                        </li>
                    </ol>

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <div class="container">

                            <form action="../dbConn/createuser.php" method="POST">

                                <div class="formbold-mb-5 flex">
                                    <div class="formbold-mb-5">
                                        <label>
                                            Full Name
                                        </label>
                                        <input type="text" name="fullname" id="inputFields"
                                            placeholder="Enter Full Name" required class="formbold-form-input" />
                                    </div>
                                    <div class="formbold-mb-5 formbold-px-3">
                                        <label>Email
                                        </label>
                                        <input type="text" name="email" id="inputFields"
                                            placeholder="Enter email for login" required="required"
                                            class="formbold-form-input" />
                                    </div>
                                </div>
                                <input type="hidden" name="id" value="<?php echo $userID ?>">

                                <div class="formbold-mb-5 flex">
                                    <div class="formbold-mb-5">
                                        <label>
                                            Password
                                        </label>
                                        <input type="password" name="pw" id="inputFields" placeholder="Enter Password"
                                            class="formbold-form-input" />
                                    </div>
                                    <div class="formbold-mb-5 formbold-px-3">
                                        <div id="inputFields">
                                            <label>
                                                User Role
                                            </label>
                                            <select class="formbold-form-label" name="role" id="">
                                                <option value="" selected disabled>Select User Role</option>
                                                <option value="E-Libing Admin">Head</option>
                                                <option value="E-Libing Staff">Staff</option>
                                                <option value="E-Libing ACAMP Site">ACAMP site</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <button class="btn btn-primary mb-4" id="addButton" type="submit"><svg
                                        class="svg-inline--fa fa-plus fa-lg" style="color: white;" aria-hidden="true"
                                        focusable="false" data-prefix="fas" data-icon="plus" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M240 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H32c-17.7 0-32 14.3-32 32s14.3 32 32 32H176V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H384c17.7 0 32-14.3 32-32s-14.3-32-32-32H240V80z">
                                        </path>
                                    </svg>
                                    <!-- <i class="fa-solid fa-plus fa-lg" style="color: white;"></i> Font Awesome fontawesome.com -->
                                    Add</button>
                            </form>
                            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                <div class="container">
                                    <div class="activity-log-container">
                                        <div class="activity-log-container-scroll">
                                            <table class="table-no-border">
                                                <thead>
                                                    <tr>
                                                        <th>Username</th>
                                                        <th>Name</th>
                                                        <th>Role</th>
                                                        <th>Created Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    $selectloc = "SELECT * FROM tblUsersLogin";
                                                    $queryloc = $conn->query($selectloc);
                                                    while ($dataloc = $queryloc->fetch_assoc()) {
                                                        $username = $dataloc['username'];
                                                        $role = $dataloc['Restriction'];
                                                        $name = $dataloc['Createdby'];
                                                        $date = $dataloc['CreatedDate'];
                                                        $userid = $dataloc['UserID'];

                                                        $first = explode(' ', $role)[0];
                                                        if ($first == 'E-Libing' && $role != 'E-Libing Client') {



                                                            ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $username ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $name ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $role ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $date ?>
                                                        </td>
                                                        <td>
                                                            <div class="mb-2">
                                                                <input type="hidden" value="<?php echo $userid ?>">
                                                                <button class="btn btn-primary "
                                                                    onclick="addNiche('<?php echo $userid ?>')">
                                                                    <i class='bx bx-edit-alt'></i>
                                                                </button>
                                                            </div>
                                                            <form action="../dbConn/delete_user.php" method="GET">
                                                                <input type="hidden" name="id"
                                                                    value="<?php echo $userid ?>">
                                                                <button class="btn btn-danger" type="submit">
                                                                    <i class="fa-solid fa-trash"></i>
                                                                </button>
                                                            </form>


                                                        </td>
                                                    </tr>
                                                    <?php }
                                                    } ?>
                                                </tbody>
                                            </table>
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


</body>

<script>
function addNiche(id) {
    var url = 'updateuser.php?userID=' + id;
    window.location.href = url;
}
</script>

</html>