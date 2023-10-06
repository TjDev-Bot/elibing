<!DOCTYPE html>
<html lang="en">
<?php
require('assets/component/header.php');
require('assets/component/topnavbar.php');
require('assets/component/sidebars.php');
include('../dbConn/conn.php');

$select = "SELECT * FROM intermentform ORDER BY cur_date_time DESC";
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
                            <h1>Activity Log</h1>
                        </li>
                    </ol>

                    <div class="activity-log-container">
                        <input type="search" id="searchInput" placeholder="Search here...">

                        <div class="activity-log-container-scroll">
                            <table class="table-no-border" id="e-libingTable">
                                <thead>
                                    <tr>
                                        <th>User ID </th>
                                        <th>Name of User</th>
                                        <th>ID of Deceased</th>
                                        <th>Name of Deceased</th>
                                        <th>Address</th>
                                        <th>Death of Date</th>
                                        <th>Action</th>
                                        <th>Date and Time</th>
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
                                                <td>
                                                    <?php echo $user_id ?>
                                                </td>
                                                <td>
                                                    <?php echo $user_name ?>
                                                </td>
                                                <td>
                                                    <?php echo $id ?>
                                                </td>
                                                <td>
                                                    <?php echo $name ?>
                                                </td>
                                                <td>
                                                    <?php echo $address ?>
                                                </td>
                                                <td>
                                                    <?php echo date('F j, Y ', strtotime($deathdate)); ?>
                                                </td>
                                                <td>
                                                    <?php echo $actions ?>
                                                </td>
                                                <td>
                                                    <?php echo date('F j, Y g:i A', strtotime($currentdatetime)); ?>
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
        
        document.addEventListener("DOMContentLoaded", function() {
            // Get the input element and table
            const searchInput = document.getElementById("searchInput");
            const alumniTable = document.getElementById("e-libingTable");

            // Add an event listener to the input field
            searchInput.addEventListener("input", function() {
                const searchText = searchInput.value.toLowerCase();

                // Get all the rows in the table body
                const rows = alumniTable.querySelectorAll("tbody tr");

                // Loop through each row and hide/show based on the search text
                rows.forEach(function(row) {
                    const rowData = row.textContent.toLowerCase();
                    if (rowData.includes(searchText)) {
                        row.style.display = ""; // Show the row
                    } else {
                        row.style.display = "none"; // Hide the row
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