<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<?php
require('assets/component/header.php');
require('assets/component/topnavbar.php');
require('assets/component/sidebars.php');
include('../dbConn/conn.php');

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
                                        <label for="" class="formbold-form-label">
                                            Full Name
                                        </label>
                                        <input type="text" name="fullname" id="name" placeholder="Enter Full Name"
                                            required class="formbold-form-input" />
                                    </div>
                                    <div class="formbold-mb-5 w-full formbold-px-3">
                                        <label for="name" class="formbold-form-label">Email
                                        </label>
                                        <input type="text" name="email" id="name" placeholder="Enter email for login"
                                            required="required" class="formbold-form-input" />
                                    </div>
                                </div>


                                <div class="formbold-mb-5 flex">
                                    <div class="formbold-mb-5 w-full">
                                        <label for="name" class="formbold-form-label">
                                            Password
                                        </label>
                                        <input type="password" name="pw" id="" placeholder="Enter Password"
                                            class="formbold-form-input" />
                                    </div>
                                    <div class="formbold-mb-5 w-full">
                                        <label for="name" class="formbold-form-label">
                                            User Role
                                        </label>
                                        <select class="formbold-form-label" name="role" id="">
                                            <option value="" selected disabled>Select User Role</option>
                                            <option value="Admin">Head</option>
                                            <option value="Staff">Staff</option>
                                            <option value="ACAMP Site">ACAMP site</option>
                                        </select>
                                    </div>

                                </div>
                                <button class="formbold-btn-next" name="next"
                                    data-bs-target="#exampleModal">Add</button>
                                <hr>
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
                                                    while ($dataloc = $queryloc->fetch(PDO::FETCH_ASSOC)) {
                                                        $username = $dataloc['username'];
                                                        $role = $dataloc['Restriction'];
                                                        $name = $dataloc['Createdby'];
                                                        $date = $dataloc['CreatedDate'];

                                                        $first = explode(' ', $role)[0];
                                                        if ($first == 'E-Libing') {



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
                                                                    <button class="btn btn-primary "
                                                                        onclick="addOcuppant('<?php echo $block_id; ?>', '<?php echo $nicheid; ?>' , '<?php echo $profid; ?>')">
                                                                        <i class='bx bx-edit-alt'></i>
                                                                    </button>
                                                                    <!-- <button class="btn btn-danger"
                                                        onclick="openDelete(<?php echo $location_id; ?>, <?php echo $block_id; ?>)">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button> -->


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


</html>