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
$yearlyNicheCounts = $result->fetch_assoc();

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

$now = new DateTime();
$selectDeath = "SELECT Birthydate FROM tblDeathRecord"; 
$resDeath = $conn->query($selectDeath);

while ($record = $resDeath->fetch_assoc()) {
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




$monthlyRevenueQuery = "SELECT MONTH(currentdate) as month, SUM(totalpayment) as total FROM tblPayment GROUP BY MONTH(currentdate)";
$monthlyRevenueResult = $conn->query($monthlyRevenueQuery);

$monthlyRevenueData = [];
while ($row = $monthlyRevenueResult->fetch_assoc()) {
    $monthlyRevenueData[$row['month']] = $row['total'];
}

for ($i = 1; $i <= 12; $i++) {
    if (!isset($monthlyRevenueData[$i])) {
        $monthlyRevenueData[$i] = 0;
    }
}

ksort($monthlyRevenueData);

$monthlyRevenueLabels = array_keys($monthlyRevenueData);
$monthlyRevenueValues = array_values($monthlyRevenueData);



?>

<head>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>


<script>
$(document).ready(function() {
    // Add an event listener to the filter button
    $("#filter-button").click(function() {
        // Capture the selected start and end dates
        var startDate = $("#startDate").val();
        var endDate = $("#endDate").val();

        $.ajax({
            type: "POST",
            url: "filter.php",
            data: {
                startDate: startDate,
                endDate: endDate
            },
            success: function(filteredData) {
                console.log(filteredData); // Log the response to the console
                updateChartData(filteredData);
            },

            error: function(xhr, status, error) {
                console.error(error);
            }
        });

    });

    function updateChartData(filteredData) {
        myLineChart.data.datasets[0].data = filteredData.monthlyRevenueValues;
        myLineChart.update();

        myBarChart.data.datasets[0].data = [
            filteredData.available,
            filteredData.reserved,
            filteredData.occupied
        ];
        myBarChart.update();

        myPieChart.data.datasets[0].data = [
            filteredData.regular,
            filteredData.seniorCitizen,
            filteredData.child
        ];
        myPieChart.update();
    }

});
</script>


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


                    <label for="startDate" style="padding-right: 127px" id="labeldate">Start Date:</label>
                    <label for="endDate" id="labeldate">End Date:</label>
                    <br>
                    <div class="formbold-mb-5 w-full formbold-px-3">
                        <input type="date" id="startDate" name="startDate">
                        <input type="date" id="endDate" name="endDate">

                        <button class="btn btn-primary" id="filter-button">
                            Filter
                        </button>
                        <button class="btn btn-primary btn-print" id="printButton">
                            <i class='bx bx-printer'></i>
                        </button>
                    </div>

                    <div class="row">
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <?php
                                   $selectDeath = "SELECT * FROM tblBuriedRecord";
                                   $resDeath = $conn->query($selectDeath);
                                   $tblDeath = [];
                                   
                                   while ($row = $resDeath->fetch_assoc()) {
                                       $tblDeath[] = $row;
                                   }
                                   
                                   $totalDeath = count($tblDeath);
                                   
                                    ?>

                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
<<<<<<< HEAD
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Total Buried in the Cemetery</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <span id="totalDeathContainer"><?php echo $totalDeath; ?></span>
                                            </div>
                                        </div>

                                        <div class="col-auto">
                                            <i class="fa-solid fa-person-digging fa-2xl" style="color: #dddfeb;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <?php
                                    $selectAvailable = "SELECT * FROM tblNiche WHERE Status = 0";
                                    $resAvailable = $conn->query($selectAvailable);
                                    $tblAvailable = [];
                                    while($row = $resAvailable->fetch_assoc()){
                                        $tblAvailable[] = $row;
                                    }

                                    $totalAvailable = count($tblAvailable);
                                    ?>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Total Available Niche</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <span id="totalAvailableContainer"> <?php echo $totalAvailable ?></span>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-solid fa-table-cells fa-2xl" style="color: #dddfeb;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <?php
                                    $selectReserved = "SELECT * FROM tblNiche WHERE Status = 1";
                                    $resReserved = $conn->query($selectReserved);
                                    $tblReserved = [];
                                    while($row = $resReserved->fetch_assoc()){
                                        $tblReserved[] = $row;
                                    }
                                    $totalReserved = count($tblReserved)
                                    ?>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Total Reserved Niche</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <span id="totalReserveContainer"> <?php echo $totalReserved ?>
                                                </span>

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
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <?php
                                   $selectApartment = "SELECT * FROM tblBuriedRecord WHERE Status1 = 0";
                                   $resApartment = $conn->query($selectApartment);
                                   $tblApartment = [];
                                   
                                   while ($row = $resApartment->fetch_assoc()) {
                                       $tblApartment[] = $row;
                                   }
                                   
                                   $totalApartment = count($tblApartment);
                                   
                                    ?>

                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Total Apartment</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <span id="totalDeathContainer"><?php echo  $totalApartment ?></span>
                                            </div>
                                        </div>

                                        <div class="col-auto">
                                            <i class="fa-solid fa-person-digging fa-2xl" style="color: #dddfeb;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <?php
                                   $selectStorage = "SELECT * FROM tblBuriedRecord WHERE Status1 = 1";
                                   $resStorage = $conn->query($selectStorage);
                                   $tblStorage = [];
                                   
                                   while ($row = $resStorage->fetch_assoc()) {
                                       $tblStorage[] = $row;
                                   }
                                   
                                   $totalStorage = count($tblStorage);
                                   
                                    ?>

                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Total Storage</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <span id="totalDeathContainer"><?php echo  $totalStorage ?></span>
                                            </div>
                                        </div>

                                        <div class="col-auto">
                                            <i class="fa-solid fa-person-digging fa-2xl" style="color: #dddfeb;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <?php
                                   $selectInChamber = "SELECT * FROM tblBuriedRecord WHERE Status1 = 2";
                                   $resInChamber = $conn->query($selectInChamber);
                                   $tblInChamber = [];
                                   
                                   while ($row = $resInChamber->fetch_assoc()) {
                                       $tblInChamber[] = $row;
                                   }
                                   
                                   $totalInChamber = count($tblInChamber);
                                   
                                    ?>

                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Total Individual Chamber</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <span id="totalDeathContainer"><?php echo  $totalInChamber ?></span>
                                            </div>
                                        </div>

                                        <div class="col-auto">
                                            <i class="fa-solid fa-person-digging fa-2xl" style="color: #dddfeb;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <?php
                                   $selectReInterment = "SELECT * FROM tblBuriedRecord WHERE Status1 = 3";
                                   $resReInterment = $conn->query($selectReInterment);
                                   $tblReInterment = [];
                                   
                                   while ($row = $resReInterment->fetch_assoc()) {
                                       $tblReInterment[] = $row;
                                   }
                                   
                                   $totalReInterment = count($tblReInterment);
                                   
                                    ?>

                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Total Re - Interment</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <span id="totalDeathContainer"><?php echo  $totalReInterment ?></span>
                                            </div>
                                        </div>

                                        <div class="col-auto">
                                            <i class="fa-solid fa-person-digging fa-2xl" style="color: #dddfeb;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <?php
                                   $selectCommonChamber = "SELECT * FROM tblBuriedRecord WHERE Status1 = 4";
                                   $resCommonChamber = $conn->query($selectCommonChamber);
                                   $tblCommonChamber = [];
                                   
                                   while ($row = $resCommonChamber->fetch_assoc()) {
                                       $tblCommonChamber[] = $row;
                                   }
                                   
                                   $totalCommonChamber = count($tblCommonChamber);
                                   
                                    ?>

                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Total Common Chamber</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <span id="totalDeathContainer"><?php echo  $totalCommonChamber ?></span>
                                            </div>
                                        </div>

                                        <div class="col-auto">
                                            <i class="fa-solid fa-person-digging fa-2xl" style="color: #dddfeb;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <?php
                                   $selectPullOut = "SELECT * FROM tblBuriedRecord WHERE Status1 = 5";
                                   $resPullOut = $conn->query($selectPullOut);
                                   $tblPullOut = [];
                                   
                                   while ($row = $resPullOut->fetch_assoc()) {
                                       $tblPullOut[] = $row;
                                   }
                                   
                                   $totalPullOut = count($tblPullOut);
                                   
                                    ?>

                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Total Pull Out</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <span id="totalDeathContainer"><?php echo  $totalPullOut ?></span>
                                            </div>
                                        </div>

                                        <div class="col-auto">
                                            <i class="fa-solid fa-person-digging fa-2xl" style="color: #dddfeb;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xxl-5 col-md-6 mb-4">

                                <div class="card shadow mb-4">
                                    <div
                                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Age Group Distribution</h6>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="myPieChart" class="chart-pie pt-4 pb-2"></canvas>
                                        <div id="dataPointsPieContainer">
                                            <div class="data-point">
                                                <span class="color-regular"></span> Regular: <span
                                                    id="regularValue"><?php echo $dataPointsPie[0]['y']; ?></span>
                                            </div>
                                            <div class="data-point">
                                                <span class="color-senior"></span> Senior Citizen: <span
                                                    id="seniorValue"><?php echo $dataPointsPie[1]['y']; ?></span>
                                            </div>
                                            <div class="data-point">
                                                <span class="color-child"></span> Child: <span
                                                    id="childValue"><?php echo $dataPointsPie[2]['y']; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="col-xxl-5 col-md-6 mb-4">
                                <div class="card shadow mb-4">
                                    <div
                                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Niche Status</h6>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="myBarChart" style="height: 280px; width: vw;"></canvas>
                                    </div>
                                </div>
                            </div>


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
=======
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
<<<<<<< HEAD
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
=======
                        </div>

                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <?php
<<<<<<< HEAD
                                    $selectAvailable = "SELECT * FROM tblNiche WHERE Status = 0";
                                    $resAvailable = $conn->query($selectAvailable);
                                    $tblAvailable = $resAvailable->fetchAll(PDO::FETCH_ASSOC);
                                    $totalAvailable = count($tblAvailable);
=======
                                        $selectAvailable = "SELECT * FROM tblNiche WHERE Status = 0";
                                        $resAvailable = $conn->query($selectAvailable);

                                        $tblAvailable = $resAvailable->fetchAll(PDO::FETCH_ASSOC);
                                        $totalAvailable = count($tblAvailable);

                                    
>>>>>>> b72c3c4ba43fb1f2e4ade966189cf6b3d95c1687
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
>>>>>>> c9be5642966b076214c66ae87a16a96449635e9f
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
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
<<<<<<< HEAD
        #labeldate,
=======
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
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
<<<<<<< HEAD
       
            plugins: {
                legend: {
                    display: false
                },
                datalabels: {
                    color: '#000',
                    anchor: 'end',
                    align: 'top',
                    font: {
                        weight: 'bold'
                    },
                    formatter: function(value, context) {
                        return value > 0 ? value : '';
                    }
                }
            }
        }
    });

=======
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
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed

    var ctxPie = document.getElementById("myPieChart").getContext("2d");
    var myPieChart = new Chart(ctxPie, {
        type: "doughnut",
        data: {
<<<<<<< HEAD
            // labels: ["Regular", "Senior Citizen", "Child"],
=======
            labels: ["Regular", "Senior Citizen", "Child"],
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
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
<<<<<<< HEAD
            maintainAspectRatio: true,
            plugins: {
                datalabels: {
                    color: '#000',
                    anchor: 'end',
                    align: 'start',
                    offset: 8,
                    font: {
                        weight: 'bold'
                    },
                    formatter: function(value, context) {
                        return value > 0 ? value : '';
                    },
                    display: true,
                }
            }
        }
    });




    document.getElementById("printButton").addEventListener("click", function() {
        window.print();
    });


    var ctx = document.getElementById("myLineChart").getContext('2d');
    var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    var ctx = document.getElementById("myLineChart").getContext('2d');

    var chartData = {
        labels: monthNames,
        datasets: [{
            label: "Earnings",
            data: <?php echo json_encode($monthlyRevenueValues); ?>,
=======
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
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
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
<<<<<<< HEAD

=======
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
    };

    var chartOptions = {
        maintainAspectRatio: false,
        scales: {
            x: {
<<<<<<< HEAD
                type: 'category',
                labels: monthNames,
=======
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
                grid: {
                    display: false,
                    drawBorder: false,
                },
<<<<<<< HEAD
            },
            y: {
=======
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
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
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

<<<<<<< HEAD
=======
    // Create the line chart
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: chartData,
        options: chartOptions
    });
<<<<<<< HEAD


    function number_format(number) {
        return number.toLocaleString();
    }
=======
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
    </script>

    <?php
    require('assets/component/script.php');
    ?>
</body>

<<<<<<< HEAD
</html>
<style>
#dataPointsPieContainer {
    display: flex;
    /* flex-direction: column; */
    justify-content: center;
    align-items: flex-end;
    /* margin-top: 20px; */
}

.data-point {
    display: flex;
    align-items: center;
    margin-bottom: 8px;
}

.data-point span {
    margin-left: 8px;
}

.color-regular {
    display: inline-block;
    width: 20px;
    height: 20px;
    background-color: #4e73df;
    margin-right: 5px;
}

.color-senior {
    display: inline-block;
    width: 20px;
    height: 20px;
    background-color: #1cc88a;
    margin-right: 5px;
}

.color-child {
    display: inline-block;
    width: 20px;
    height: 20px;
    background-color: #36b9cc;
    margin-right: 5px;
}
</style>
=======
</html>
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
