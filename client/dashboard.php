<!DOCTYPE html>
<html lang="en">
<?php
require('assets/component/header.php');
require('assets/component/topnavbar.php');
require('assets/component/sidebars.php');
include "../dbConn/conn.php";



?>

<head>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
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

                    <div class="row">

                        <div class="row">
                            <div class="col-xl-4 col-md-6" style="margin-top: 30px;">

                            </div>
                            <div class="col-xl-4 col-md-6 mb-4">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Reminder</h6>
                                    </div>
                                    <div class="card-body">
                                        <?php
                                        $userID = $_SESSION['id'];
                                        $createdby = $_SESSION['Createdby'];
                                        $select = "SELECT * FROM tblContactInfo 
                                            INNER JOIN tblDeathRecord ON tblContactInfo.ProfID = tblDeathRecord.ProfileID
                                            RIGHT JOIN tblIntermentReservation ON tblContactInfo.ProfID = tblIntermentReservation.ProfID
                                            LEFT JOIN tblNiche ON tblIntermentReservation.NId = tblNiche.Nid
                                            LEFT JOIN tblNicheLocation ON tblNiche.LocID = tblNicheLocation.LocID
                                            WHERE tblContactInfo.Createdby = '$createdby'";
                                        $query = $conn->query($select);
                                        while ($data = $query->fetch_assoc()) {
                                            $nid = $data['Nid'];
                                            $type = $data['Type'];
                                            $date = $data['IntermentDateTime'];
                                            $nl = $data['NLName'];
                                            $nno = $data['Nno'];

                                            if ($nid == null) {


                                        ?>

                                                <div class="note">
                                                    <p>
                                                        Please visit the CHLMO on the 2nd floor of City Hall to select the
                                                        interment schedule. You have Three days to settle your appointment.
                                                        Please state the applicant's or deceased name on the form you have
                                                        submitted for us to check your application.
                                                        Requirements; <br>
                                                        1. Death Certificate of the Deceased <br>
                                                        2. For PWD, the Xerox copy of the deceased's ID (back-to-back) <br>
                                                        3. For senior citizens, a Xerox copy of the deceased's ID is also needed
                                                        (back-to-back). <br>
                                                        4. For the indigent, please bring a Xerox of certificate of indigency.
                                                        Thank you!
                                                    </p>
                                                </div>

                                            <?php } elseif ($nid != null) { ?>
                                                <div class="note">
                                                    <?php
                                                    if ($date != null) {
                                                        echo "  Interment Schedule: <?php echo $date ?> <br>";
                                                    }
                                                    ?>
                                                    Location: <?php echo ucfirst($nl) ?> <br>
                                                    Niche No: <?php echo $nno ?> <br>
                                                    Type: <?php echo ucfirst($type) ?> <br>
                                                    <?php if ($date == null) { ?>
                                                        <button class="btn btn-warning direct-payment-btn" data-profile-id="<?php echo $data['AppointmentID']; ?>" data-requestor-name="<?php echo $data['Requestor']; ?>" data-deceased-name="<?php echo $data['Fname'] . ' ' . $data['MName'] . ' ' . $data['Lname']; ?>">
                                                            Direct Payment
                                                        </button> <br>
                                                        <button class="btn btn-info">Online Payment</button>
                                                    <?php } ?>
                                                </div>
                                        <?php }
                                        } ?>
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
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll(".direct-payment-btn").forEach(function(button) {
                button.addEventListener("click", function() {
                    var profileID = this.dataset.profileId;
                    var requestorName = this.dataset.requestorName;
                    var deceasedName = this.dataset.deceasedName;
                    var printContent = "ProfileID: " + profileID + "\nRequestor Name: " +
                        requestorName +
                        "\nDeceased Name: " + deceasedName;

                    var printWindow = window.open('', '_blank');
                    printWindow.document.write('<pre>' + printContent + '</pre>');
                    printWindow.document.close();
                    printWindow.print();
                });
            });
        });
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