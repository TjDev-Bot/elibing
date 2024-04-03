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
                                <div class="col-sm-6">
                                    <select id="timeFilter">
                                        <option value="all">All</option>
                                        <option value="1_year">Fresh</option>
                                        <option value="1_month">Near Due</option>
                                    </select>
                                    <button class="btn btn-primary btn-print" id="print-button">
                                        <i class='bx bx-printer'></i>
                                    </button>
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
                                                <th scope="col" class="px-6 py-3" style="display: none;">
                                                    Contact No
                                                </th>
                                                <th scope="col" class="px-6 py-3 " style="display: none;">
                                                    Email
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Due
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="table-body">
                                            <?php
                                            $processedProfileIDs = array(); 
                                            $groupedRecords = array();

                                            $select = "SELECT 
                                                tblBuriedRecord.Status AS BuriedStatus,
                                                tblBuriedRecord.*,
                                                tblNiche.*,
                                                tblIntermentReservation.*,
                                                tblDeathRecord.*,
                                                tblNicheLocation.*,
                                                tblContactInfo.*
                                                FROM tblNiche
                                                INNER JOIN tblIntermentReservation ON tblNiche.Nid = tblIntermentReservation.Nid
                                                INNER JOIN tblDeathRecord ON tblIntermentReservation.ProfID = tblDeathRecord.ProfileID 
                                                INNER JOIN tblNicheLocation ON tblNiche.LocID = tblNicheLocation.LocID
                                                INNER JOIN tblContactInfo ON tblDeathRecord.ProfileID = tblContactInfo.ProfID
                                                INNER JOIN tblBuriedRecord ON tblIntermentReservation.ProfID = tblBuriedRecord.Profid 
                                                WHERE tblBuriedRecord.OccupancyDate IS NOT NULL ORDER BY tblBuriedRecord.BurID DESC";

                                            $query = $conn->query($select);

                                            while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
                                                $profileID = $data['ProfileID'];

                                                $nicheno = $data['Nno'];
                                                $occ = $data['OccupancyDate'];
                                                $groupKey = $nicheno . '_' . $occ;
                                                if (in_array($profileID, $processedProfileIDs)) {
                                                    continue;
                                                }
                                                $processedProfileIDs[] = $profileID;
                                                if (!isset($groupedRecords[$groupKey])) {
                                                    $groupedRecords[$groupKey] = array();
                                                }

                                                $groupedRecords[$groupKey][] = $data;
                                            }

                                            foreach ($groupedRecords as $group) {
                                                foreach ($group as $data) {
                                                    $profileID = $data['ProfileID'];

                                                    $full = $data['Fname'] . ' ' . $data['MName'] . ' ' . $data['Lname']. ' ' . $data['Suffix'];
                                                    $locID = $data['LocID'];
                                                    $nicheno = $data['Nno'];
                                                    $level = $data['Level'];
                                                    $type = $data['BuriedStatus'];
                                                    $contact = $data['ContactNo'];
                                                    $email = $data['Email'];
                                                    $occ = $data['OccupancyDate'];
                                                    $burid = $data['BurID'];
                                                    $startDate = new DateTime($occ);
                                                    $currentDate = new DateTime();
                                                    $currentDateString = $currentDate->format('Y-m-d');
                                                    $timeDifference = $currentDate->diff($startDate);
                                                    $daysDifference = $timeDifference->days;
                                                    $due = $startDate->add(new DateInterval('P5Y'));
                                                    $dueDateString = $due->format('F j, Y');
                                                    if ($currentDate > $due && $daysDifference >= 0 && $type == 0) {
                                                      
                                                        $updateQuery = "UPDATE tblBuriedRecord
                                                                        SET Status = 1
                                                                        WHERE Profid = :profid
                                                                        AND DATEDIFF(day ,:due, :currentDate) >= 0";

                                                        $updateStmt = $conn->prepare($updateQuery);
                                                        $updateStmt->bindParam(':profid', $profileID);
                                                        $updateStmt->bindParam(':currentDate', $currentDateString);
                                                        $updateStmt->bindParam(':due', $dueDateString);
                                                        $updateStmt->execute();

                                                    } else if($currentDate > $due && $daysDifference >= 0 && $type == 2){

                                                        $updateQuery = "UPDATE tblBuriedRecord
                                                            SET Status = 4
                                                            WHERE Profid = :profid
                                                            AND DATEDIFF(day ,:due, :currentDate) >= 0";

                                                        $updateStmt = $conn->prepare($updateQuery);
                                                        $updateStmt->bindParam(':profid', $profileID);
                                                        $updateStmt->bindParam(':currentDate', $currentDateString);
                                                        $updateStmt->bindParam(':due', $dueDateString);
                                                        $updateStmt->execute();

                                                    }
                                           
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
                                                    <?php
                                                        if ($type == 0) {
                                                            echo "Apartment";   
                                                        } elseif ($type == 1){
                                                            echo "Storage";
                                                        } elseif($type == 2){
                                                            echo "Individual Chamber";
                                                        } elseif($type == 3){
                                                            echo "Re - Interment";
                                                        } elseif($type == 4){
                                                            echo "Common Chamber";
                                                        }elseif($type == 5){
                                                            echo "Pull - Out";
                                                        }
                                                        ?>
                                                </td>
                                                <td>
                                                    <?php echo $level ?>
                                                </td>
                                                <td style="display: none;">
                                                    <?php echo $contact ?>
                                                </td>
                                                <td style="display: none;">
                                                    <?php echo $nid ?>
                                                </td>
                                                <td style="display: none;">
                                                    <?php echo $email ?>
                                                </td>
                                                <td>
                                                    <?php if ($type == 5) { ?>
                                                    <span
                                                        class="due-date special-color"><?php echo $dueDateString; ?></span>
                                                    <?php } else { ?>
                                                    <span class="due-date"><?php echo $dueDateString; ?></span>
                                                    <span class="due-warning"></span>
                                                    <?php } ?>

                                                </td>
                                                <td>
                                                    <button class="btn btn-primary"
                                                        onclick="View('<?php echo $profileID; ?>')">
                                                        <i class='bx bx-edit-alt'> </i>
                                                    </button>
                                                    <?php if ($type != 4 && $type != 5) { ?>
                                                    <button class="btn btn-danger"
                                                        onclick="renew('<?php echo $profileID ?>')">
                                                    <i class='bx bxs-file-plus'></i>
                                                    </button>
                                                    <?php } ?>
                                                    <form id="smsForm" action="../submitsms.php" method="POST">
                                                        <input type="hidden" name="contact"
                                                            value="<?php echo $contact ?>">
                                                        <input type="hidden" name="email" value="<?php echo $email ?>">
                                                        <button class="btn btn-success submit-button" type="button"
                                                            data-profile-id="<?php echo $profileID ?>">
                                                            <i class='bx bx-send'></i>
                                                        </button>
                                                    </form>
                                                    <div id="response"></div>
                                                </td>
                                            </tr>
                                            <?php
                                                }
                                            }
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
    <style>
    .special-color {
        color: black !important;
    }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        $(".submit-button").click(function() {
            var form = $(this).closest('form'); // Find the closest form
            var formData = form.serialize();
            $.ajax({
                type: "POST",
                url: form.attr("action"),
                data: formData,
                success: function(response) {
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
        font-size: 8px;
        font-weight: 900;
        line-height: normal;
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