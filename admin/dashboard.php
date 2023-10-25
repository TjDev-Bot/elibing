    <!DOCTYPE html>
    <html lang="en">
    <?php
    require('assets/component/header.php');
    require('assets/component/topnavbar.php');
    require('assets/component/sidebars.php');
    include "../dbConn/conn.php";
    
    $yearlyNicheCountQuery = "SELECT 
    SUM(CASE WHEN Status = 0 THEN 1 ELSE 0 END) as available,
    SUM(CASE WHEN Status = 1 THEN 1 ELSE 0 END) as reserved,
    SUM(CASE WHEN Status = 2 THEN 1 ELSE 0 END) as occupied
    FROM tblNiche";

    $result = $conn->query($yearlyNicheCountQuery);
    $yearlyNicheCounts = $result->fetch(PDO::FETCH_ASSOC);

    $dataPoints = [
        ['label' => 'Available', 'y' => $yearlyNicheCounts['available']],
        ['label' => 'Reserved', 'y' => $yearlyNicheCounts['reserved']],
        ['label' => 'Occupied', 'y' => $yearlyNicheCounts['occupied']]
    ];

    ?>

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <body>
        <div id="layoutSidenav">
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <!-- <h1 class="mt-4">Dashboard</h1> -->
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">
                                <h1 style="color:white">Dashboard</h1>
                            </li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-4 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <?php
                                        // $firstDayOfMonth = date('Y-m-01');
                                        // $lastDayOfMonth = date('Y-m-t');
                                        
                                        // $selectInterment = "SELECT COUNT(*) AS total FROM tblDeathRecord WHERE IntermentDateTime BETWEEN '$firstDayOfMonth' AND '$lastDayOfMonth'";
                                        // $resInterment = $conn->query($selectInterment);
                                        
                                        // $tblInterment = $resInterment->fetch(PDO::FETCH_ASSOC);
                                        // $totalInterment = $tblInterment['total'];
                                        $selectDeath = "SELECT * FROM tblDeathRecord";
                                        $resDeath = $conn->query($selectDeath);

                                        $tblDeath = $resDeath->fetchAll(PDO::FETCH_ASSOC);
                                        $totalDeath = count($tblDeath);

                                        ?>
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Total Buried in the Cemetery</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php echo $totalDeath ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fa-solid fa-person-digging fa-2xl"
                                                    style="color: #dddfeb;"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <?php
                                        $selectAvailable = "SELECT * FROM tblNiche WHERE Status = 0";
                                        $resAvailable = $conn->query($selectAvailable);

                                        $tblAvailable = $resAvailable->fetchAll(PDO::FETCH_ASSOC);
                                        $totalAvailable = count($tblAvailable);
                                        ?>
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Total Available Niche</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php echo $totalAvailable ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fa-solid fa-table-cells fa-2xl" style="color: #dddfeb;"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-md-6 mb-4">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <?php
                                        $selectReserved = "SELECT * FROM tblNiche WHERE Status = 1";
                                        $resReserved = $conn->query($selectReserved);

                                        $tblReserved = $resReserved->fetchAll(PDO::FETCH_ASSOC);
                                        $totalReserved = count($tblReserved);


                                        ?>
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                    Total Reserved Niche</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php echo $totalReserved ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fa-solid fa-square-person-confined fa-2xl"
                                                    style="color: #dddfeb;"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4 col-md-6 mb-4">
                                    <div class="card shadow mb-4">
                                        <div
                                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                            <h6 class="m-0 font-weight-bold text-primary">BURIED IN THE CEMETERY</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="chart-pie pt-4 pb-2">
                                                <canvas id="myPieChart"></canvas>
                                            </div>
                                            <div class="mt-4 text-center small">
                                                <span class="mr-2">
                                                    <i class="fas fa-circle text-primary"></i>Adult
                                                </span>
                                                <span class="mr-2">
                                                    <i class="fas fa-circle text-success"></i>Senior Citizen
                                                </span>
                                                <span class="mr-2">
                                                    <i class="fas fa-circle text-info"></i>Baby
                                                </span>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-md-6 mb-4">
                                    <div class="card shadow mb-4">
                                        <div
                                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                            <h6 class="m-0 font-weight-bold text-primary">Niche Status</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="chart-area">
                                                <div id="chartContainer" style="height: 330px; width: 100%;"></div>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-xl-4 col-md-6 mb-4">
                                    <div class="card shadow mb-4">
                                        <div
                                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                            <h6 class="m-0 font-weight-bold text-primary">Monthly Revenue</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="chart-area">
                                                <canvas id="myAreaChart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                            </div>
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
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        <script>
        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            exportEnabled: false,
            theme: "light1",
            creditText: '',
            trialVersion: false,
            data: [{
                type: "column",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();
        </script>

        <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/chart-area-demo.js"></script>
        <script src="js/demo/chart-pie-demo.js"></script>

    </body>

    </html>