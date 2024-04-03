<!DOCTYPE html>
<html lang="en">

<?php
require('assets/component/header.php');
require('assets/component/topnavbar.php');
require('assets/component/sidebars.php');
include('../dbConn/conn.php');

$select = "SELECT * FROM tblUsersLogin 
RIGHT JOIN tblContactInfo ON tblUsersLogin.Createdby = tblContactInfo.Createdby
INNER JOIN tblIntermentReservation ON tblContactInfo.ProfID = tblIntermentReservation.ProfID
INNER JOIN tblDeathRecord ON tblIntermentReservation.ProfID = tblDeathRecord.ProfileID WHERE tblUsersLogin.Restriction = 'E-Libing Client'";
$query = $conn->query($select);

?>

<body>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">
                            <h1>Request</h1>
                        </li>
                    </ol>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <div class="container">
                            <div class="activity-log-container">
                                <div class="col-sm-6">
                                    <input type="search" id="searchInput" placeholder="Search here...">
                                </div>
                                <div class="activity-log-container-scroll" id="interment-schedule-table">
                                    <table class="table-no-border" id="table-no-border">
                                        <thead>
                                            <tr>
                                                <!--<th scope="col" class="px-6 py-3">
                                            SchedID
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Niche No.
                                        </th>-->
                                                <th scope="col" class="px-6 py-3">
                                                    Requestor Name
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Deceased Name
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Action
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody id="e-libingTable">
                                            <?php
                                                while ($data = $query->fetch_assoc()) {
                                                    $name = $data['Fname'] . ' ' . $data['Mname'] . ' ' . $data['Lname']. ' ' .$data['Suffix'];
                                                    $requestor = $data['Requestor'];                                                
                                                    $profid = $data['ProfID'];
                                                    $niche = $data['Nid'];

                                                    if($niche == null){

                                                    

                                            ?>
                                            <tr id="elementToHide">
                                                <td>
                                                    <?php echo $requestor ?>
                                                </td>
                                                <td>
                                                    <?php echo $name ?>
                                                </td>
                                                <td>
                                                    <button class="btn btn-primary submit-button" type="button"
                                                        onclick="view('<?php echo $profid ?>')">
                                                        <i class='bx bx-edit-alt'></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <?php } }
                                            ?>
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script>
    function view(profID) {
        var url = 'requestloc.php?id=' + profID;

        window.location.href = url;
    }
    </script>




    <style>
    .loader {
        border: 4px solid rgba(255, 255, 255, 0.3);
        border-top: 4px solid #3498db;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        animation: spin 2s linear infinite;
        display: none;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    .update-label {
        display: inline-block;
        margin-right: 10px;
    }

    .add-appointment {
        box-shadow: 0px 10px 14px -7px #276873;
        background: linear-gradient(to bottom, #4169e1 5%, #408c99 100%);
        background-color: #4169e1;
        border-radius: 8px;
        display: inline-block;
        cursor: pointer;
        color: #ffffff;
        font-family: Courier New;
        font-size: 20px;
        font-weight: bold;
        padding: 13px 32px;
        text-decoration: none;
        text-shadow: 0px 1px 0px #3d768a;
    }

    .add-appointment:hover {
        background: linear-gradient(to bottom, #4169e1 5%, #599bb3 100%);
        background-color: #4169e1;
    }

    .add-appointment:active {
        position: relative;
        top: 1px;
    }
    </style>



    <?php
    require('assets/component/script.php');
    ?>


</body>

</html>