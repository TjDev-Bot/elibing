<!DOCTYPE html>
<html lang="en">

<?php
require('assets/component/header.php');
require('assets/component/topnavbar.php');
require('assets/component/sidebars.php');

include "../dbConn/conn.php";


// if (isset($_GET['LocID'])) {
//     $block_id = $_GET['LocID'];
//     $select = "SELECT * FROM tblNicheLocation WHERE LocID = $block_id";
//     // $query = mysqli_query($conn, $select);

//     // while ($data = mysqli_fetch_assoc($query)) {
//     //     $id = $data['block_id'];
//     // }
// }
?>


<body>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <!-- <h1 class="mt-4">Niche</h1> -->
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">
                            <h1>Reserved Niche</h1>
                        </li>
                    </ol>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <div class="container">
                            <div class="activity-log-container">
                                <div class="activity-log-container-scroll">
                                    <table class="table-no-border">
                                        <thead>
                                            <tr>
                                                <th>Appointment ID</th>
                                                <th>Location ID</th>
                                                <th>Niche No</th>
                                                <th>Profile ID</th>
                                                <th>Name</th>
                                                <th>Relationship</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $selectreserve = 'SELECT * FROM  tblNiche
                                            INNER JOIN tblIntermentReservation ON  tblNiche.Nid =  tblIntermentReservation.Nid
                                            INNER JOIN tblNicheLocation ON tblNiche.LocID = tblNicheLocation.LocID
                                            INNER JOIN tblDeathRecord ON tblIntermentReservation.ProfID = tblDeathRecord.ProfileID';
                                            $queryreserve = $conn->query($selectreserve);
                                            while ($dataloc = $queryreserve->fetch(PDO::FETCH_ASSOC)) {
                                                
                                                $appointmentID = $dataloc['AppointmentID'];
                                                $relationship = $dataloc['Relationship'];
                                                $locID = $dataloc['LocID'];
                                                $nicheno = $dataloc['Nid'];
                                                $profID = $dataloc['ProfID'];
                                                $name = $dataloc['Fname'].' '.$dataloc['MName'].' '.$dataloc['Lname'];
                                                $status = $dataloc['Status'];
                                                $nid = $dataloc['Nid'];
                                                if($status == 1){
                                                    $statustoString = "Reserved";
                                            ?>
                                            <tr>
                                                <td><?php echo $appointmentID ?></td>
                                                <td><?php echo $locID ?></td>
                                                <td><?php echo $nicheno ?></td>                                               
                                                <td><?php echo $profID ?></td>  
                                                <td><?php echo $name ?></td>                                              
                                                <td><?php echo $relationship ?></td>
                                                <td><?php echo $statustoString ?></td>
                                                <td>
                                                    <button class="btn btn-primary "
                                                        onclick="viewReserve('<?php echo $appointmentID; ?>')">
                                                        <i class='bx bx-edit-alt'></i>
                                                    </button>


                                                </td>
                                            </tr>
                                            <?php } } ?>
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
    function viewReserve(appointmentID) {
        var url = 'viewreserve.php?AppID=' + appointmentID;
        window.location.href = url;
    }
    document.getElementById("search-input").addEventListener("input", searchTable);
    </script>
    <?php
    require('assets/component/script.php');
    ?>
</body>

</html>