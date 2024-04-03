<!DOCTYPE html>
<html lang="en">

<?php
require('assets/component/header.php');
require('assets/component/topnavbar.php');
require('assets/component/sidebars.php');
include('../dbConn/conn.php');

// $select = "SELECT * FROM intermentform ORDER BY STR_TO_DATE(CONCAT(desired_date, ' ', desired_time), '%Y-%m-%d %H:%i:%s') ASC";
// $query = mysqli_query($conn, $select);

?>
<link rel="stylesheet" href="css/intermentschedule.css">
<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
}
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
                    <!-- <div class="container">
                        <form action="../dbConn/delete_data.php" method="GET">
                            

                        </form>
                    </div> -->

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <div class="container">
                            <?php include("scheduling1.php") ?>
                        </div>
            </main>
        </div>
    </div>




    <?php
    require('assets/component/script.php');
    ?>


</body>

</html>