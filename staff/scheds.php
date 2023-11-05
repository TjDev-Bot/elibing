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
                    <div class="container">
<<<<<<< HEAD
                        <form action="../dbConn/staff_delete_data.php" method="GET">
                            <input type="hidden" name="id" value="<?php echo $id ?>">
                            <button class="formbold-btn-back" id="backButton">Back</button>
=======
                        <form action="../dbConn/delete_data.php" method="GET">
                            
>>>>>>> c9be5642966b076214c66ae87a16a96449635e9f

                        </form>
                    </div>

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <div class="container">
                            <?php include("scheduling.php") ?>
                        </div>
            </main>
        </div>
    </div>




    <?php
    require('assets/component/script.php');
    ?>


</body>

</html>