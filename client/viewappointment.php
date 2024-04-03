<!DOCTYPE html>
<html lang="en">
<?php
require('assets/component/header.php');
require('assets/component/topnavbar.php');
require('assets/component/sidebars.php');
include('../dbConn/conn.php');

$select = "SELECT * FROM intermentform ORDER BY id DESC";
$query = mysqli_query($conn, $select);
?>

<head>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">
                            <h1>View Appointment</h1>
                        </li>
                    </ol>
                    <div class="activity-log-container">
                        <div class="activity-log-container-scroll">
                            <table class="table-no-border">
                                <thead>
                                    <tr>
                                        <th>ID of Deceased</th>
                                        <th>Name of Deceased</th>
                                        <th>Address</th>
                                        <th>Death of Date</th>
                                        <th>Death of Time</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($data = mysqli_fetch_array($query)) {
                                        $user_id = $data['user_id'];
                                        $user_name = $data['user_name'];
                                        $id = $data['id'];
                                        $name = $data['deceased'];
                                        $relationship = $data['relationship'];
                                        $address = $data['barangay'] . ' ' . $data['purok'];
                                        $age = $data['age'];
                                        $deathdate = $data['deathdate'];
                                        $desireddate = $data['desired_date'];
                                        $desiredtime = $data['desired_time'];
                                        $currentdatetime = $data['cur_date_time'];
                                        $actions = $data['actions'];
                                        $role = $data['role'];

                                        if ($role !== 'client') {
                                    ?>
                                            <tr>

                                                <td><?php echo $id ?></td>
                                                <td><?php echo $name ?></td>
                                                <td><?php echo $address ?></td>
                                                <td><?php echo date('F j, Y ', strtotime($deathdate)); ?></td>
                                                <td><?php echo date(' g:i A', strtotime($desiredtime)); ?></td>
                                                <td>
                                                    <button class="btn btn-primary mb-4"  onclick="updateForm(<?php echo $id; ?>)">
                                                        <i class='bx bx-edit-alt'></i>
                                                    </button>
                                                </td>
                                            </tr>
                                    <?php }
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script>
        function updateForm($id) {

            var url = 'editappointment.php?id=' + $id;

            window.location.href = url;

        }
    </script>
    <?php
    require('assets/component/script.php');
    ?>
</body>

</html>