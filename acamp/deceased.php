<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<?php
require('assets/component/header.php');
require('assets/component/topnavbar.php');
require('assets/component/sidebars.php');
include('../dbConn/conn.php');
$id = $_SESSION['id'];
$select1  = "SELECT * FROM tblUsersLogin WHERE UserID = '$id'";
$query1 = $conn->query($select1);
while($data = $query1->fetch_assoc()){
    $email1 = $data['username'];
}
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
<<<<<<< HEAD

                            <div class="activity-log-container">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="search" id="searchInput" placeholder="Search here...">
                                    </div>
                                    <div class="col-sm-6">
                                        <select id="typeFilter">
                                            <option value="all">All</option>
                                            <option value="Apartment">Apartment</option>
                                            <option value="Storage">Storage</option>
                                            <option value="Individual Chamber">Individual Chamber</option>
                                            <option value="Re - Interment">Re - Interment</option>
                                            <option value="Common Chamber">Common Chamber</option>
                                            <option value="Pull - Out">Pull - Out</option>
                                        </select>
                                        <!--button class="btn btn-primary btn-print" id="print-button">
                                            <i class='bx bx-printer'></i>
                                        </button-->
                                    </div>
                                </div>
=======
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="search" id="searchInput" placeholder="Search here...">
<<<<<<< HEAD
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
=======

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
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
                                <div class="activity-log-container-scroll">
                                    <table class="table-no-border" id="e-libingTable">
                                        <thead>
                                            <tr>
<<<<<<< HEAD
=======
                                
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
                                                <th scope="col" class="px-6 py-3">
                                                    Name
                                                </th>
                                                <th scope="col" class="px-6 py-3">
<<<<<<< HEAD
                                                    Niche Location
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Niche Number
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Status
                                                </th>
=======
                                                    Block No.
                                                </th>

                                                <th scope="col" class="px-6 py-3">
                                                    Niche No.
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Appartment Type
                                                </th>

>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
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
<<<<<<< HEAD
                                                <!-- <th scope="col" class="px-6 py-3">
                                                    Action
                                                </th> -->
=======

                                                <th scope="col" class="px-6 py-3">
                                                    Action
                                                </th>

>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
                                            </tr>
                                        </thead>
                                        <tbody id="table-body">
                                            <?php
<<<<<<< HEAD
                                                $processedProfileIDs = array(); 
                                                $groupedRecords = array();

                                                $select = "SELECT 
                                                    tblBuriedRecord.Status1 AS BuriedStatus,
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

                                                while ($data = $query->fetch_assoc()) {
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

                                                    $full = $data['Fname'] . ' ' . $data['Mname'] . ' ' . $data['Lname']. ' ' . $data['Suffix'];
                                                    $locID = $data['LocID'];
                                                    $nicheno = $data['Nno'];
                                                    $level = $data['Level'];
                                                    $type = $data['BuriedStatus'];
                                                    $contact = $data['ContactNo'];
                                                    $email = $data['Email'];
                                                    $occ = $data['OccupancyDate'];
                                                    $burid = $data['BurID'];
                                                    $nl = $data['NLName'];
                                                    $startDate = new DateTime($occ);
                                                    $currentDate = new DateTime();
                                                    $currentDateString = $currentDate->format('Y-m-d');
                                                    $timeDifference = $currentDate->diff($startDate);
                                                    $daysDifference = $timeDifference->days;
                                                    $due = $startDate->add(new DateInterval('P5Y'));
                                                    $dueDateString = $due->format('F j, Y');
                                                   
                                                    if ($currentDate > $due && $daysDifference >= 0) {
                                                        $newStatus = ($type == 0) ? 1 : (($type == 2) ? 4 : (($type == 3) ? 1 : $type));
                                                    
                                                        $updateQuery = "UPDATE tblBuriedRecord
                                                        SET Status1 = $newStatus
                                                        WHERE Profid = $profileID";
                                                        // -- AND TIMESTAMPDIFF(DAY, '$currentDateString', '$dueDateString') >= 0";
                                                        
                                                        if ($conn->query($updateQuery)) {
                                                            // echo "Update successful!";
                                                            // echo "Query: . $updateQuery". "<br>";
                                                            // echo "Profile ID: " . $profileID . "<br>";
                                                            // echo "Current Date: " . $currentDateString . "<br>";
                                                            // echo "Due Date: " . $dueDateString . "<br>";
                                                        } else {
                                                            echo "Error: " . $conn->error;
                                                        }
                                        
                                                    }
                                                    
                                                                                            
                                            ?>
=======
                                                $select = "SELECT * FROM tblNiche
>>>>>>> c9be5642966b076214c66ae87a16a96449635e9f
                                                INNER JOIN tblIntermentReservation ON tblNiche.Nid = tblIntermentReservation.Nid
                                                INNER JOIN tblDeathRecord ON tblIntermentReservation.ProfID = tblDeathRecord.ProfileID 
                                                INNER JOIN tblNicheLocation ON tblNiche.LocID = tblNicheLocation.LocID
                                                INNER JOIN tblContactInfo ON tblDeathRecord.ProfileID = tblContactInfo.ProfID
                                                INNER JOIN tblBuriedRecord ON tblNiche.Nid = tblBuriedRecord.Nid WHERE tblBuriedRecord.OccupancyDate IS NOT NULL";
<<<<<<< HEAD
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
=======
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

                                                    // if ($currentDate > $due && $daysDifference >= -7) {
                                                    //     $insertChamber = "INSERT INTO chamber (fname, mname, lname, suffix, dateofdeath, causeofdeath) 
                                                    //     VALUES (:fname, :mname, :lname, :suffix, :dateofdeath, :causeofdeath)";
                                                    //     $stmt = $conn->prepare($insertChamber);
                                                    //     $stmt->execute([
                                                    //         ':fname' => $data['fname'],
                                                    //         ':mname' => $data['mname'],
                                                    //         ':lname' => $data['lname'],
                                                    //         ':suffix' => $data['suffix'],
                                                    //         ':dateofdeath' => $data['intermentdate'],
                                                    //         ':causeofdeath' => $data['causeofdeath']
                                                    //     ]);

                                                    //     // Remove data from the current table
                                                    //     $deleteOccupant = "DELETE FROM occupant WHERE occupant_id = :occupant_id";
                                                    //     $stmt = $conn->prepare($deleteOccupant);
                                                    //     $stmt->execute([':occupant_id' => $profileID]);

                                              
                                                ?>
>>>>>>> c9be5642966b076214c66ae87a16a96449635e9f
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed


                                            <tr>
                                                <td>
                                                    <?php echo $full ?>
                                                </td>
                                                <td>
<<<<<<< HEAD
                                                    <?php echo $nl ?>
=======
                                                    <?php echo $locID ?>

>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
                                                </td>
                                                <td>
                                                    <?php echo $nicheno ?>
                                                </td>
                                                <td>
<<<<<<< HEAD
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
=======
                                                    <?php echo $type ?>
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
                                                </td>
                                                <td>
                                                    <?php echo $level ?>
                                                </td>
<<<<<<< HEAD
                                                <td  style="display: none;">
                                                    <?php echo $contact ?>
                                                </td>
                                                <td style="display: none;">
                                                    <?php echo $nid ?>
=======
<<<<<<< HEAD


                                                </form>
                                                <div id="response"></div>
=======
                                                <td style="display: none;">
                                                    <?php echo $contact ?>
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
                                                </td>
                                                <td style="display: none;">
                                                    <?php echo $email ?>
                                                </td>
<<<<<<< HEAD
                                                <td>
                                                    <?php if ($type == 5) { ?>
                                                    <span
                                                        class="due-date special-color"><?php echo $dueDateString; ?></span>
                                                    <?php } else { ?>
                                                    <span class="due-date"><?php echo $dueDateString; ?></span>
                                                    <span class="due-warning"></span>
                                                    <?php } ?>

                                                </td>
                                                <!-- <td>
                                                    <div class="mb-2">
                                                        <button class="btn btn-primary" style="display: none;"
                                                            onclick="View('<?php echo $profileID; ?>', '<?php echo $type; ?>')">
                                                            <i class='bx bx-edit-alt'> </i>
                                                        </button>
                                                    </div>

                                                    <?php if ($type != 4 && $type != 5) { ?>
                                                    <div class="mb-2">
                                                        <button class="btn btn-danger" style="display: none;"
                                                            onclick="renew('<?php echo $profileID ?>')">
                                                            <i class='bx bxs-file-plus'></i>
                                                        </button>
                                                    </div>
                                                    <?php } ?>
                                                    <form id="smsForm" action="../submitsms.php" method="POST">
                                                        <input type="hidden" name="profileID" value="">
=======
                                                <td> 
                                                    <span class="due-date"><?php echo $due->format('F j, Y'); ?></span>
                                                    <span class="due-warning"></span>
                                                </td>
                                                <td>
                                                    <button class="btn btn-primary"
                                                        onclick="View('<?php echo $profileID; ?>')">
                                                        <i class='bx bx-edit-alt'> </i>
                                                    </button>
                                                    <button class="btn btn-danger"
                                                        onclick="renew('<?php echo $profileID ?>')">
                                                        <i class='bx bxs-file-plus'></i>
                                                    </button>
                                                    <form id="smsForm" action="../submitsms.php" method="POST">
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed

                                                        <input type="hidden" name="contact"
                                                            value="<?php echo $contact ?>">
                                                        <input type="hidden" name="email" value="<?php echo $email ?>">
<<<<<<< HEAD
                                                        <input type="hidden" name="email1"
                                                            value="<?php echo $email1 ?>">
                                                        <button class="btn btn-success submit-button" type="button"
                                                            style="display: none;" id="smsButton"
                                                            data-profile-id="<?php echo $profileID.' '.$contact ?>"

                                                            >
                                                            <i class='bx bx-send'></i>
                                                        </button>
                                                    </form>
                                                    <div id="response"></div>
                                                </td> -->
                                            </tr>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
=======
                                                        <button class="btn btn-success submit-button" type="button"
                                                            data-profile-id="<?php echo $profileID ?>">
                                                            <i class='bx bx-send'></i>
                                                        </button>

                                                    </form>
                                                    <div id="response"></div>
>>>>>>> c9be5642966b076214c66ae87a16a96449635e9f


                                                </td>
                                            </tr>

<<<<<<< HEAD
                                        <?php } ?>
                                    </tbody>
                                </table>


=======
                                            <?php } ?>
                                        </tbody>
                                    </table>


                                </div>
>>>>>>> c9be5642966b076214c66ae87a16a96449635e9f
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
                            </div>
                        </div>
                    </div>
                </div>
<<<<<<< HEAD
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
        console.log("Script is running");

        $("#typeFilter").change(function() {
            var filterValue = $(this).val();

            $("#table-body tr").each(function() {
                var burialType = $(this).find("td:eq(3)").text().trim();

                if (filterValue === "all" || burialType === filterValue) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });

        });

        function calculateTimeDifference(dueDate) {
            var currentDate = new Date();
            var dueDateObj = new Date(dueDate);
            var timeDifference = dueDateObj - currentDate;
            var daysDifference = Math.floor(timeDifference / (1000 * 60 * 60 * 24));

            return daysDifference;
        }

        function submitForm(profileID) {
            var form = $("#smsForm");
            form.find('[name="profileID"]').val(profileID);
=======
<<<<<<< HEAD
        </div>
        </main>
    </div>
=======
            </main>
        </div>
>>>>>>> c9be5642966b076214c66ae87a16a96449635e9f
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
<<<<<<< HEAD
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
=======
    $(document).ready(function() {
        $(".submit-button").click(function() {
            var form = $(this).closest('form'); // Find the closest form
            var formData = form.serialize();
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed

            $.ajax({
                type: "POST",
                url: form.attr("action"),
<<<<<<< HEAD
                data: form.serialize(),
                success: function(response) {
                    console.log("AJAX Response:", response); // Log AJAX response

=======
                data: formData,
                success: function(response) {
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
                    if (response === "success") {
                        Swal.fire({
                            title: 'Success',
                            text: 'SMS and email sent successfully',
                            icon: 'success'
                        });
                    } else {
                        Swal.fire({
                            title: 'Error',
<<<<<<< HEAD
                            text: response,
=======
                            text: response, // Display the error message from submitsms.php
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
                            icon: 'error'
                        });
                    }
                    $("#response").html(response);
                }
            });
<<<<<<< HEAD
        }

        $(".due-date").each(function() {
            var profileID = $(this).closest("tr").find(".submit-button").data("profile-id");
            console.log("Checking Profile ID:", profileID);
            // console.log("ContactNo:", c)

            var dueDateString = $(this).text();
            console.log("Due Date String:", dueDateString);

            var dueDate = new Date(dueDateString);
            console.log("Due Date Object:", dueDate);

            var oneMonthBefore = calculateTimeDifference(new Date(dueDate.getFullYear(), dueDate
                .getMonth() - 1, dueDate.getDate()));
            var oneWeekBefore = calculateTimeDifference(new Date(dueDate.getFullYear(), dueDate
                .getMonth(), dueDate.getDate() - 7));
            var today = calculateTimeDifference(dueDate);
            
            console.log("One Month Before:", oneMonthBefore);
            console.log("One Week Before:", oneWeekBefore);
            console.log("Today:", today);

            if (oneMonthBefore >= 0 && oneMonthBefore <= 30) {
                console.log("Calling submitForm for profileID:", profileID);
                submitForm(profileID);
            } else if (oneWeekBefore >= 0 && oneWeekBefore <= 7) {
                console.log("Calling submitForm for profileID:", profileID);
                submitForm(profileID);
            } else if (today === 0) {
                console.log("Calling submitForm for profileID:", profileID);
                submitForm(profileID);
            }
=======
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
        });
    });
    </script>
    <style>
    .due-date {
        font-weight: 900;
    }

    .due-warning {
<<<<<<< HEAD
        font-size: 8px;
        font-weight: 900;
        line-height: normal;
    }
    </style>
    <script>
    function View(profileID, type) {
        var url = 'viewmaster.php?id=' + profileID +  '&status' + type;
=======
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
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
        window.location.href = url;
    }

    function renew(profileID) {
        var url = 'renewal.php?id=' + profileID;
        window.location.href = url;
    }
<<<<<<< HEAD
    </script>
=======
>>>>>>> c9be5642966b076214c66ae87a16a96449635e9f
    </script>


>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
    <?php
    require('assets/component/script.php');
    ?>
</body>

</html>