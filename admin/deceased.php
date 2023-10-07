<!DOCTYPE html>
<html lang="en">
<?php
require('assets/component/header.php');
require('assets/component/topnavbar.php');
require('assets/component/sidebars.php');
include('../dbConn/conn.php');
?>

<body>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <!-- <h1 class="mt-4">Deceased</h1> -->
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">
                            <h1>Deceased</h1>
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
                                        <option value="1_year">1 Year - 4 Years</option>
                                        <!-- <option value="2_years">2 Years</option>
                                <option value="3_years">3 Years</option> -->
                                        <!-- <option value="4_years">4 Years</option> -->
                                        <option value="5_years">5 Years above</option>
                                        <option value="1_month_to_6_months">1 week - 6 Months</option>
                                        <option value="today">Today</option>
                                        <option value="pastDue">Past Due</option>
                                    </select>
                                </div>
                            </div>


                            <div class="activity-log-container">
                                <div class="activity-log-container-scroll">
                                    <table class="table-no-border" id="e-libingTable">
                                        <thead>
                                            <tr>
                                                <!--th scope="col" class="px-6 py-3">
                                            Niche No.
                                        </th>-->
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
                                                    Level
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
                                                $select = "SELECT * FROM occupant INNER JOIN location ON location.location_id = occupant.location_id";
                                                $query = $conn->query($select); // Use the PDO query method

                                                while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
                                                    $occupant_id = $data['occupant_id'];
                                                    $nameoccupant = $data['fname'] . ' ' . $data['mname'] . ' ' . $data['lname'];
                                                    $block = $data['block_id'];
                                                    $nicheno = $data['nicheno'];
                                                    $level = $data['level'];
                                                    $startDate = new DateTime($data['intermentdate'] . ' ' . $data['intermenttime']);
                                                    $currentDate = new DateTime();

                                                    $timeDifference = $currentDate->diff($startDate);

                                                    $daysDifference = $timeDifference->days;
                                                    $due = $startDate->add(new DateInterval('P5Y'));

                                                    if ($currentDate > $due && $daysDifference >= -7) {
                                                        $insertChamber = "INSERT INTO chamber (fname, mname, lname, suffix, dateofdeath, causeofdeath) 
                                                        VALUES (:fname, :mname, :lname, :suffix, :dateofdeath, :causeofdeath)";
                                                        $stmt = $conn->prepare($insertChamber);
                                                        $stmt->execute([
                                                            ':fname' => $data['fname'],
                                                            ':mname' => $data['mname'],
                                                            ':lname' => $data['lname'],
                                                            ':suffix' => $data['suffix'],
                                                            ':dateofdeath' => $data['intermentdate'],
                                                            ':causeofdeath' => $data['causeofdeath']
                                                        ]);

                                                        // Remove data from the current table
                                                        $deleteOccupant = "DELETE FROM occupant WHERE occupant_id = :occupant_id";
                                                        $stmt = $conn->prepare($deleteOccupant);
                                                        $stmt->execute([':occupant_id' => $occupant_id]);
                                                    }
                                                }
                                                ?>


                                            <tr>

                                                <td>
                                                    <?php echo $nameoccupant ?>
                                                </td>
                                                <td>
                                                    <?php echo $block ?>

                                                </td>
                                                <td>
                                                    <?php echo $nicheno ?>
                                                </td>
                                                <td>
                                                    <?php echo $level ?>
                                                </td>
                                                <td>
                                                    <span class="due-date"><?php echo $due->format('F j, Y'); ?></span>
                                                    <span class="due-warning"></span>
                                                </td>
                                                <td>
                                                    <button class="btn btn-primary"
                                                        onclick="View('<?php echo $occupant_id; ?>')">
                                                        <i class='bx bx-edit-alt'> </i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
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
    function updateCountdown() {
        var dueDateElements = document.querySelectorAll('.due-date');
        var dueWarningElements = document.querySelectorAll('.due-warning');

        dueDateElements.forEach(function(dueDateElement, index) {
            var dueDateString = dueDateElement.textContent;
            var dueDate = new Date(dueDateString);
            var currentDate = new Date();

            var timeDifference = dueDate - currentDate;
            var daysDifference = Math.floor(timeDifference / (24 * 60 * 60 * 1000));
            var hoursDifference = Math.floor((timeDifference % (24 * 60 * 60 * 1000)) / (60 * 60 * 1000));
            var minutesDifference = Math.floor((timeDifference % (60 * 60 * 1000)) / (60 * 1000));
            var secondsDifference = Math.floor((timeDifference % (60 * 1000)) / 1000);

            var dueWarning = '';
            var warningColor = '';

            if (currentDate > dueDate) {
                dueWarning = 'Past Due (' + daysDifference + ' days ' + hoursDifference + 'h ' +
                    minutesDifference + 'm ' + secondsDifference + 's)';
                warningColor = 'red';
                dueDateElement.style.color = 'red';
            } else if (daysDifference >= 7 && daysDifference < 30) {
                dueWarning = 'A week (' + daysDifference + ' days)';
                warningColor = 'blue';
                dueDateElement.style.color = 'blue';
            } else if (hoursDifference >= 168) {
                dueWarning = 'A month or more (' + hoursDifference + 'h ' + minutesDifference + 'm ' +
                    secondsDifference + 's left)';
                warningColor = 'green';
                dueDateElement.style.color = 'green';
            } else if (daysDifference >= 1 && daysDifference <= 6) {
                dueWarning = 'a (' + daysDifference + ' day/s left)';
                warningColor = 'orange';
                dueDateElement.style.color = 'orange';
            } else if (daysDifference === 0) {
                dueWarning = 'Today (' + hoursDifference + 'h ' + minutesDifference + 'm ' + secondsDifference +
                    's left)';
                warningColor = 'orange';
                dueDateElement.style.color = 'orange';
            } else if (daysDifference >= 30) {
                dueWarning = 'A month or more (' + daysDifference + ' days)';
                warningColor = 'green';
                dueDateElement.style.color = 'green';
            }

            dueWarningElements[index].textContent = dueWarning;
            dueWarningElements[index].style.color = warningColor;
        });
    }


    function updateCountdownInterval() {
        updateCountdown();
        setInterval(updateCountdown, 1000); // Update countdown every second
    }

    document.addEventListener("DOMContentLoaded", function() {
        updateCountdownInterval();

        const searchInput = document.getElementById("searchInput");
        const alumniTable = document.getElementById("e-libingTable");

        searchInput.addEventListener("input", function() {
            const searchText = searchInput.value.toLowerCase();
            const rows = alumniTable.querySelectorAll("tbody tr");

            rows.forEach(function(row) {
                const rowData = row.textContent.toLowerCase();
                if (rowData.includes(searchText)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        });



        function filterTable() {
            var selectedValue = document.getElementById('timeFilter').value;
            var table = document.getElementById('e-libingTable');
            var rows = table.getElementsByTagName('tr');

            for (var i = 0; i < rows.length; i++) {
                var row = rows[i];
                var dueCell = row.querySelector('.due-date');
                var name = row.getElementsByTagName('td')[0];

                if (name && dueCell) {
                    var nameText = name.textContent.toLowerCase();
                    var dueDate = new Date(dueCell.textContent);
                    var currentDate = new Date();

                    switch (selectedValue) {
                        case 'all':
                            row.style.display = '';
                            break;
                        case '1_year':
                            var timeDifference = dueDate - currentDate;
                            var daysDifference = Math.floor(timeDifference / (24 * 60 * 60 * 1000));
                            if (daysDifference >= 365 && daysDifference <= 1460) {
                                row.style.display = '';
                            } else {
                                row.style.display = 'none';
                            }
                            break;
                            // case '2_years':
                            //     var timeDifference = dueDate - currentDate;
                            //     var daysDifference = Math.floor(timeDifference / (24 * 60 * 60 * 1000));
                            //     if (daysDifference >= 730) {
                            //         row.style.display = '';
                            //     } else {
                            //         row.style.display = 'none';
                            //     }
                            //     break;
                            // case '3_years':
                            //     if (currentDate.getFullYear() - dueDate.getFullYear() === 3) {
                            //         row.style.display = '';
                            //     } else {
                            //         row.style.display = 'none';
                            //     }
                            //     break;
                            // case '4_years':
                            //     if (currentDate.getFullYear() - dueDate.getFullYear() === 4) {
                            //         row.style.display = '';
                            //     } else {
                            //         row.style.display = 'none';
                            //     }
                            //     break;
                        case '5_years':
                            var timeDifference = dueDate - currentDate;
                            var daysDifference = Math.floor(timeDifference / (24 * 60 * 60 * 1000));
                            if (daysDifference >= 1825) {
                                row.style.display = '';
                            } else {
                                row.style.display = 'none';
                            }
                            break;
                        case '1_month_to_6_months':
                            var timeDifference = dueDate - currentDate;
                            var daysDifference = Math.floor(timeDifference / (24 * 60 * 60 * 1000));
                            if (daysDifference >= 7 && daysDifference <= 180) {
                                row.style.display = '';
                            } else {
                                row.style.display = 'none';
                            }
                            break;

                        case 'today':
                            var timeDifference = dueDate - currentDate;
                            var daysDifference = Math.floor(timeDifference / (24 * 60 * 60 * 1000));
                            if (daysDifference >= 0 && daysDifference <= 1) {
                                row.style.display = '';
                            } else {
                                row.style.display = 'none';
                            }
                            break;
                            break;
                        case 'pastDue':
                            if (currentDate > dueDate) {
                                row.style.display = '';
                            } else {
                                row.style.display = 'none';
                            }
                            break;
                    }
                }
            }
        }

        // Add an event listener for the filter change event
        document.getElementById('timeFilter').addEventListener('change', filterTable);

        // Initial table filtering
        filterTable();


    });

    function View($occupant_id) {
        var url = 'viewmaster.php?id=' + $occupant_id;
        window.location.href = url;
    }
    </script>

    <?php
    require('assets/component/script.php');
    ?>
</body>

</html>