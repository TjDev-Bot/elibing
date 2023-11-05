<!DOCTYPE html>
<html lang="en">
<?php
require('assets/component/header.php');
require('assets/component/topnavbar.php');
require('assets/component/sidebars.php');
include('../dbConn/conn.php');
?>
<link rel="stylesheet" type="text/css" href="css/print.css" media="print">



<body>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <!-- <h1 class="mt-4">Deceased</h1> -->
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">
                            <h1>Death Record</h1>
                        </li>
                    </ol>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="search" id="searchInput" placeholder="Search here...">
                                </div>
                            </div>
                        </div>
                        <div class="activity-log-container">
                            <div class="activity-log-container-scroll">
                                <table class="table-no-border" id="e-libingTable">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="px-6 py-3">
                                                Name
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Block No.
                                            </th>

                                            <th scope="col" class="px-6 py-3">
                                                Niche No.
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Appartment Type
                                            </th>

                                            <th scope="col" class="px-6 py-3">
                                                Level
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody id="table-body">
                                        <?php
                                        $select = "SELECT * FROM tblNiche
                                                INNER JOIN tblIntermentReservation ON tblNiche.Nid = tblIntermentReservation.Nid
                                                INNER JOIN tblDeathRecord ON tblIntermentReservation.ProfID = tblDeathRecord.ProfileID 
                                                INNER JOIN tblNicheLocation ON tblNiche.LocID = tblNicheLocation.LocID
                                                INNER JOIN tblContactInfo ON tblDeathRecord.ProfileID = tblContactInfo.ProfID
                                                INNER JOIN tblBuriedRecord ON tblNiche.Nid = tblBuriedRecord.Nid WHERE tblBuriedRecord.OccupancyDate IS NOT NULL";
                                        $query = $conn->query($select);

                                        while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
                                            $profileID = $data['ProfileID'];
                                            $full = $data['Fname'] . ' ' . $data['MName'] . ' ' . $data['Lname'];
                                            $locID = $data['LocID'];
                                            $nicheno = $data['Nid'];
                                            $level = $data['Level'];
                                            $type = $data['Type'];
                                            $contact = $data['ContactNo'];
                                            $email = $data['Email'];
                                            $occ = $data['OccupancyDate'];
                                            $startDate = new DateTime($occ);
                                            $currentDate = new DateTime();

                                            $timeDifference = $currentDate->diff($startDate);

                                            $daysDifference = $timeDifference->days;
                                            $due = $startDate->add(new DateInterval('P5Y'));



                                            ?>


                                            <tr>
                                                <td>
                                                    <?php echo $full ?>
                                                </td>
                                                <td>
                                                    <?php echo $locID ?>

                                                </td>
                                                <td>
                                                    <?php echo $nicheno ?>
                                                </td>
                                                <td>
                                                    <?php echo $type ?>
                                                </td>
                                                <td>
                                                    <?php echo $level ?>
                                                </td>


                                                </form>
                                                <div id="response"></div>


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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".submit-button").click(function () {
                var form = $(this).closest('form'); // Find the closest form
                var formData = form.serialize();

                $.ajax({
                    type: "POST",
                    url: form.attr("action"),
                    data: formData,
                    success: function (response) {
                        if (response === "success") {
                            Swal.fire({
                                title: 'Success',
                                text: 'SMS and email sent successfully',
                                icon: 'success'
                            });
                        } else {
                            Swal.fire({
                                title: 'Error',
                                text: response, // Display the error message from submitsms.php
                                icon: 'error'
                            });
                        }
                        $("#response").html(response);
                    }
                });
            });
        });
    </script>
    <style>
        .due-date {
            font-weight: 900;
        }

        .due-warning {
            /* color: red; */
            font-size: 8px;
            font-weight: 900;
            line-height: normal;
            /* display: flex;
        text-align: start;
        justify-content: start; */
        }
    </style>
    <script>
        function View(profileID) {
            var url = 'viewmaster.php?id=' + profileID;
            window.location.href = url;
        }

        function renew(profileID) {
            var url = 'renewal.php?id=' + profileID;
            window.location.href = url;
        }
    </script>


    <?php
    require('assets/component/script.php');
    ?>
</body>

</html>