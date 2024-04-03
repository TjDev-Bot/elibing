<!DOCTYPE html>
<html lang="en">

<?php
require('assets/component/header.php');
require('assets/component/topnavbar.php');
require('assets/component/sidebars.php');
include('../dbConn/conn.php');

$select = "SELECT * FROM renewal ORDER BY cur_date_time DESC";
$query = mysqli_query($conn, $select);
?>

<body>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <!-- <h1 class="mt-4">Due Cadavers</h1> -->
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">
                            <h1>Renewed</h1>
                        </li>
                    </ol>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <div class="container">
                            <input type="search" id="searchInput" placeholder="Search here...">
                            <div class="activity-log-container">
                                <div class="activity-log-container-scroll">
                                    <table class="table-no-border">
                                        <thead>
                                            <tr>
                                                <!--th scope="col" class="px-6 py-3">
                                            Niche No
                                        </th>-->

                                                <th scope="col" class="px-6 py-3">
                                                    Name
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Date of Death
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Date of Burial
                                                </th>
                                                <!--th scope="col" class="px-6 py-3">
                                            Date of Transfer
                                        </th>-->
                                                <th scope="col" class="px-6 py-3">
                                                    Month
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Transaction Date
                                                </th>

                                                <th scope="col" class="px-6 py-3">
                                                    Action
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody id="table-body">
                                            <?php
                                            while ($data = mysqli_fetch_array($query)) {
                                                //$user_id = $data['user_id'];
                                                //$id = $data['id'];
                                                $name = $data['deceased'];
                                                $dateofburial = $data['deathdate'];
                                                $interment = $data['interment'];
                                                $month = $data['month'];
                                                $currentdatetime = $data['cur_date_time'];
                                            ?>
                                                <tr>
                                                    <!-- <td>
                                                    ?php echo $user_id ?>
                                                </td>
                                                <td>
                                                    ?php echo $id ?>
                                                </td>-->
                                                    <td>
                                                        <?php echo $name ?>
                                                    </td>
                                                    <td>
                                                        <?php echo date('F j, Y ', strtotime($dateofburial)); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo date('F j, Y ', strtotime($interment)); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $month ?>
                                                    </td>
                                                    <td>
                                                        <?php echo date('F j, Y g:i A', strtotime($currentdatetime)); ?>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-primary " onclick="addLocation(<?php echo $id; ?>)">
                                                            <i class='bx bx-edit-alt'></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php } ?>
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