<!DOCTYPE html>
<html lang="en">
<?php
   require('assets/component/header.php');
   require('assets/component/topnavbar.php');
   require('assets/component/sidebar.php');
?>

<body>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <!-- <h1 class="mt-4">Dashboard</h1> -->
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active"><h1>Dashboard</h1></li>
                    </ol>

                </div>

            </main>
        </div>
    </div>


    <?php
        require('assets/component/script.php');
    ?>


    <style>
    #index-text {
        color: maroon !important;
    }

    .card {
        transition: transform 0.3s;
    }

    .card:hover {
        transform: scale(1.1);
    }
    </style>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>

</body>

</html>