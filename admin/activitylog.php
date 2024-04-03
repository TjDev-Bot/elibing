<!DOCTYPE html>
<html lang="en">
<?php
require('assets/component/header.php');
require('assets/component/topnavbar.php');
require('assets/component/sidebars.php');
include('../dbConn/conn.php');

$select = "SELECT * FROM tblUsersLogin INNER JOIN TBL_Audit_Trail ON tblUsersLogin.UserID = TBL_Audit_Trail.User_ID ORDER BY TBL_Audit_Trail.Date DESC";
$query = $conn->query($select);


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
                    <input type="search" id="searchInput" placeholder="Search here...">
                    <div class="activity-log-container">
                        <div class="activity-log-container-scroll">
                            <table class="table-no-border" id="e-libingTable">
                                <thead>
                                    <tr>
                                        <th>User</th>
                                        <th>Action</th>
                                        <th>Date & Time</th>

                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                   while ($data = $query->fetch_assoc()) {
                                        // $full = $data['Createdby'];
                                        // $locID = $data['LocID'];
                                        // $name = $data['Fname'].' '.$data['MName'].' '.$data['Lname'];
                                        // $requestor = $data['Requestor'];
                                        // $nicheno = $data['Nid'];
                                        // $level = $data['Level'];
                                        // $type = $data['Type'];
                                        // $contact = $data['ContactNo'];
                                        // $email = $data['Email'];
                                        // $occ = $data['OccupancyDate'];
                                        // $createdwhen = $data['CreatedWhen'];
                                        // $modifiedwhen = $data['ModifiedWhen'];
                                        $full = $data['Createdby'];
                                        $action = $data['Action'];
                                        $datetime = $data['Date'].' '.$data['Timex'];
                                        $restriction = $data['Restriction'];

                                        $restrictionsArray = explode(' ', $restriction);
                                        foreach ($restrictionsArray as $restrictionItem) {
                                            if (stripos($restrictionItem, 'E-Libing') !== false) {
                                                ?>
                                        <tr>
                                            <td><?php echo $restriction[8] . ' ' . $full ?></td>
                                            <td><?php echo $action ?></td>
                                            <td><?php echo date('F j, Y g:i A', strtotime($datetime)); ?></td>
                                        </tr>
                                        <?php
                                                break;
                                            }
                                        }
                                }
                                
                                ?>
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