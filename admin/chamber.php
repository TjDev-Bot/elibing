<!DOCTYPE html>
<html lang="en">

<?php
require('assets/component/header.php');
require('assets/component/topnavbar.php');
require('assets/component/sidebars.php');
include "../dbConn/conn.php";

?>

<body>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <!-- <h1 class="mt-4">Niche</h1> -->
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">
                            <h1>Chamber</h1>
                        </li>
                    </ol>

                    <h3>  <button class="btn btn-primary mb-4" style="float: right" type="button" name="submit" onclick="addChamber()">Add</button></h3>
</br></br>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <div class="container">
                        <input type="search" id="searchInput" placeholder="Search here...">
                            <!-- <input type="search" id="search-input" placeholder="Search here..."> -->
                            <div class="activity-log-container">
                                <div class="activity-log-container-scroll">
                                <table class="table-no-border" id="e-libingTable">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Date of Death</th>
                                                <th>Cause of Death</th>
                                                
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $selectocc = "SELECT * FROM chamber";
                                            $queryocc = mysqli_query($conn, $selectocc);
                                            while ($data = mysqli_fetch_array($queryocc)) {
                                                $name = $data['fname'] . ' ' . $data['mname'] . ' ' . $data['lname'] . ' ' . $data['suffix'];
                                                $dateofdeath =  $data['dateofdeath'];
                                                $causeofdeath =  $data['causeofdeath'];

                                            ?>
                                                <tr>


                                                    <td class="px-6 py-4">
                                                        <?php echo $name ?>
                                                    </td>

                                                    <td class="px-6 py-4">
                                                        <?php echo date('F j, Y', strtotime($dateofdeath)); ?>
                                                    </td>

                                                    <td class="px-6 py-4">
                                                        <?php echo $causeofdeath ?>
                                                    </td>

                                                    
                                                </tr>
                                            <?php } ?>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        function goBack($block_id) {
            var url = 'chamber.php?';
            window.location.href = url;
        }

        function addChamber() {

            var url = 'cform.php?';

            window.location.href = url;

        }

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

    document.getElementById("search-input").addEventListener("input", searchTable);

    </script>

    <?php
    require('assets/component/script.php');
    ?>

</body>

</html>