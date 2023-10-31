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

$dataPointsPie = [
    ['label' => 'Regular', 'y' => 0],
    ['label' => 'Senior Citizen', 'y' => 0],
    ['label' => 'Child', 'y' => 0],
];

$selectDeath = "SELECT Birthydate FROM tblDeathRecord"; 
$resDeath = $conn->query($selectDeath);
$tblDeath = $resDeath->fetchAll(PDO::FETCH_ASSOC);

$now = new DateTime();

foreach ($tblDeath as $record) {
    $birthDate = new DateTime($record['Birthydate']);
    $age = $now->diff($birthDate)->y;

    if ($age >= 18 && $age < 60) {
        $dataPointsPie[0]['y']++; 
    } elseif ($age >= 60) {
        $dataPointsPie[1]['y']++; 
    } else {
        $dataPointsPie[2]['y']++; 
    }
}

?>

<head>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">
                            <h1 style="color:white">Dashboard</h1>
                        </li>
                    </ol>

                    <label for="startDate" style="padding-right: 127px">Start Date:</label> <label for="endDate">End
                        Date:</label>
                    </br>
                    <div class="formbold-mb-5 w-full formbold-px-3">
                        <input type="date" id="startDate">
                        <input type="date" id="endDate">

                        <button class="btn btn-primary " id="filter-button">
                            Filter
                        </button>
                        <button class="btn btn-primary btn-print " id="printButton">
                            <i class='bx bx-printer'></i>
                        </button>
                    </div>
                    <div class="row">

                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <?php
                                    $selectDeath = "SELECT * FROM tblBuriedRecord";
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
                                            <i class="fa-solid fa-person-digging fa-2xl" style="color: #dddfeb;"></i>
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
                                        <h6 class="m-0 font-weight-bold text-primary">Age Group Distribution</h6>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="myPieChart" class="chart-pie pt-4 pb-2"></canvas>
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
                                        <canvas id="myBarChart" style="height: 330px; width: 100%;"></canvas>
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
                                            <canvas id="myLineChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>




                        </div>
                    </div>
            </main>
        </div>
    </div>
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

    @media print {

        .sb-topnav,
        .sb-sidenav {
            display: none;
        }

        #startDate,
        #endDate,
        #printButton,
        #filter-button {
            display: none;
        }

        @page {
            size: A4;
            margin: 0;
        }

        body {
            width: 100%;
            height: 297mm;
            margin: 0;
        }
    }
    </style>
    <script>
    var ctxBar = document.getElementById("myBarChart").getContext("2d");
    var myBarChart = new Chart(ctxBar, {
        type: "bar",
        data: {
            labels: ["Available", "Reserved", "Occupied"],
            datasets: [{
                label: "",
                data: [
                    <?php echo $yearlyNicheCounts['available']; ?>,
                    <?php echo $yearlyNicheCounts['reserved']; ?>,
                    <?php echo $yearlyNicheCounts['occupied']; ?>
                ],
                backgroundColor: ["#4e73df", "#1cc88a", "#36b9cc"],
                borderWidth: 1
            }]
        },
        options: {
            maintainAspectRatio: false,
            scales: {
                x: {
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: "Status"
                    }
                },
                y: {
                    beginAtZero: true,
                    display: false,
                    scaleLabel: {
                        display: true,
                        labelString: "Count"
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        }

    });

    var ctxPie = document.getElementById("myPieChart").getContext("2d");
    var myPieChart = new Chart(ctxPie, {
        type: "doughnut",
        data: {
            labels: ["Regular", "Senior Citizen", "Child"],
            datasets: [{
                data: [
                    <?php echo $dataPointsPie[0]['y']; ?>,
                    <?php echo $dataPointsPie[1]['y']; ?>,
                    <?php echo $dataPointsPie[2]['y']; ?>
                ],
                backgroundColor: ["#4e73df", "#1cc88a", "#36b9cc"]
            }]
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: "#dddfeb",
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10
            },

        }
    });

    document.getElementById("printButton").addEventListener("click", function() {
        window.print();
    });


    var ctx = document.getElementById("myLineChart").getContext('2d');

    // Chart data and options
    var chartData = {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
            label: "Earnings",
            data: [0, 10000, 5000, 15000, 10000, 20000, 15000, 25000, 20000, 30000, 25000, 40000],
            borderColor: "rgba(78, 115, 223, 1)",
            backgroundColor: "rgba(78, 115, 223, 0.05)",
            pointRadius: 3,
            pointBackgroundColor: "rgba(78, 115, 223, 1)",
            pointBorderColor: "rgba(78, 115, 223, 1)",
            pointHoverRadius: 3,
            pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
            pointHoverBorderColor: "rgba(78, 115, 223, 1)",
            pointHitRadius: 10,
            pointBorderWidth: 2,
        }]
    };

    var chartOptions = {
        maintainAspectRatio: false,
        scales: {
            x: {
                grid: {
                    display: false,
                    drawBorder: false,
                },
                ticks: {
                    maxTicksLimit: 7,
                    callback: function(value, index, values) {
                        return value; // Remove $ sign
                    }
                }
            },
            y: {
                ticks: {
                    maxTicksLimit: 5,
                    padding: 10,
                    callback: function(value, index, values) {
                        return '$' + number_format(value);
                    }
                },
                grid: {
                    color: "rgb(234, 236, 244)",
                    zeroLineColor: "rgb(234, 236, 244)",
                    drawBorder: false,
                    borderDash: [2],
                    zeroLineBorderDash: [2]
                }
            }
        },
        plugins: {
            legend: {
                display: false
            },
            tooltip: {
                enabled: false, // Disable tooltips
            }
        }
    };

    // Create the line chart
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: chartData,
        options: chartOptions
    });
    </script>

    <?php
    require('assets/component/script.php');
    ?>
</body>

</html>