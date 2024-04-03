<!DOCTYPE html>
<html lang="en">

<?php
require('assets/component/header.php');
require('assets/component/topnavbar.php');
require('assets/component/sidebars.php');
include('../dbConn/conn.php');

$select = "SELECT * FROM tblIntermentReservation
LEFT JOIN tblBuriedRecord ON tblIntermentReservation.ProfID = tblBuriedRecord.Profid
INNER JOIN tblNiche ON tblIntermentReservation.Nid = tblNiche.Nid 
INNER JOIN tblDeathRecord ON tblIntermentReservation.ProfID = tblDeathRecord.ProfileID WHERE tblDeathRecord.IntermentDateTime IS NOT NULL  ORDER BY IntermentDateTime DESC";
$query = $conn->query($select);

$userID = $_SESSION['id'];

?>

<body>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">
                            <h1>Interment Schedule</h1>
                        </li>
                    </ol>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <div class="container">

                            <div class="activity-log-container">
                                <div class="col-sm-6">
                                    <input type="search" id="searchInput" placeholder="Search here...">
                                </div>
                                <div class="activity-log-container-scroll" id="interment-schedule-table">
                                    <table class="table-no-border" id="e-libingTable">
                                        <thead>
                                            <tr>
                                                <!--<th scope="col" class="px-6 py-3">
                                            SchedID
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Niche No.
                                        </th>-->
                                                <th scope="col" class="px-6 py-3">
                                                    Name
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Interment Date & Time
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Action
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody id="table-body" id="interment-schedule-body">
                                            <?php
                                                while ($data = $query->fetch_assoc()) {
                                                    $name = $data['Fname'] . ' ' . $data['Mname'] . ' ' . $data['Lname'] . ' ' . $data['Suffix'];
                                                    $desireddatetime = $data['IntermentDateTime'];
                                                    $nicheno = $data['Nid'];
                                                    $profid = $data['ProfileID'];
                                                    $appID = $data['AppointmentID'];
                                                    $status = $data['Status'];
                                                    $occupancy = $data['OccupancyDate'];

                                                    if ($occupancy == null && $desireddatetime != '0000-00-00 00:00:00') {

                                            ?>
                                            <tr id="elementToHide">
                                                <td>
                                                    <?php echo $name ?>
                                                </td>
                                                <td>
                                                    <?php echo date('F j, Y g:i A', strtotime($desireddatetime)); ?>
                                                </td>
                                                <td>
                                                    <div class="buttons">
                                                        <input type="hidden" name="profid"
                                                            value="<?php echo $profid ?>">
                                                        <input type="hidden" name="appid" value="<?php echo $appID ?>">
                                                        <form action="../dbConn/upintermentsched.php" method="POST">
                                                            <input type="hidden" name="userid" value="<?php echo $userID ?>">
                                                            <input type="hidden" name="nid"
                                                                value="<?php echo $nicheno ?>">
                                                            <input type="hidden" name="profid"
                                                                value="<?php echo $profid ?>">
                                                            <input type="hidden" name="name"
                                                                value="<?php echo $name ?>">
                                                            <button class="btn btn-success submit-button" type="button"
                                                                id="updateButton">

                                                                <span class="update-label">Repose</span>
                                                                <div class="loader"></div>
                                                            </button>
                                                            <button class="btn btn-primary" type="button"
                                                                onclick="view('<?php echo $appID; ?>', '<?php echo $profid; ?>')">
                                                                <i class='bx bx-edit-alt'></i>
                                                            </button>
                                                        </form>
                                                        <div style="display:none;" id="response"></div>

                                                    </div>
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
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script>
    function view(appointmentID, profID) {
        var url = 'viewInterment.php?AppID=' + appointmentID + '&ProfID=' + profID;
        profID;
        window.location.href = url;
    }
    $(document).ready(function() {
        $(".submit-button").click(function() {
            var form = $(this).closest('form');
            var formData = form.serialize();
            var updateButton = $(this);
            var loader = updateButton.find('.loader');

            updateButton.prop("disabled", true);
            updateButton.find(".update-label").hide();
            loader.show();

            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you clicked the right button?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: form.attr("action"),
                        data: formData,
                        success: function(response) {
                            var trimmedResponse = $.trim(response);

                            updateButton.prop("disabled", false);
                            loader.hide();
                            updateButton.find(".update-label").show();

                            if (trimmedResponse === "success") {
                                form.closest('tr').remove();

                                Swal.fire({
                                    title: 'Success',
                                    text: 'Interment Successfully Reserved',
                                    icon: 'success'
                                });
                            } else {
                                Swal.fire({
                                    title: 'Error',
                                    text: response,
                                    icon: 'error'
                                });
                            }
                            $("#response").html(response);
                        }
                    });
                } else {
                    updateButton.prop("disabled", false);
                    updateButton.find(".update-label").show();
                    loader.hide();
                }
            });
        });
    });

    var intermentDateTime = <?php echo json_encode($desireddatetime); ?>;

    if (intermentDateTime === null || intermentDateTime === '') {
        var elementToHide = document.getElementById(
            'elementToHide');
        if (elementToHide) {
            elementToHide.style.display = 'none';
        }
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

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Get the input element and table
        const searchInput = document.getElementById("searchInput");
        const alumniTable = document.getElementById("search");

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
