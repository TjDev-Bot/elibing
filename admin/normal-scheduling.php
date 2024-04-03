<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
<style>

</style>

<?php
function build_calendar($month, $year) {
    include('../dbConn/conn.php');

    $schedules = array();
    $result = $conn->query("SELECT * FROM tblDeathRecord WHERE MONTH(IntermentDateTime) = '$month' AND YEAR(IntermentDateTime) = '$year'");

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $schedules[] = $row['IntermentDateTime'];
        }
    }

    $days_of_week = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");

    $first_day_of_month = mktime(0, 0, 0, $month, 1, $year);
    $number_days = date('t', $first_day_of_month);
    $date_components = getdate($first_day_of_month);
    $month_name = $date_components['month'];
    $day_of_week = $date_components['wday'];
    $date_today = date('Y-m-d');

    $prev_month = date('m', mktime(0, 0, 0, $month - 1, 1, $year));
    $prev_year = date('Y', mktime(0, 0, 0, $month - 1, 1, $year));
    $next_month = date('m', mktime(0, 0, 0, $month + 1, 1, $year));
    $next_year = date('Y', mktime(0, 0, 0, $month + 1, 1, $year));

    $profileId = isset($_GET['profid']) ? $_GET['profid'] : '';

    $calendar = "<center class='month-sched'><h2>$month_name $year</center></h2></center>";
    $calendar .= "<div class='text-center'>";
    $calendar .= "<a class='btn btn-primary btn-xs mx-1' href='?month=$prev_month&year=$prev_year&profid=$profileId'><i class='fa-solid fa-angles-left'></i> Prev</a>";
    $calendar .= "<a class='btn btn-primary btn-xs mx-1' href='?month=" . date('m') . "&year=" . date('Y') . "&profid=$profileId'>Current Month</a>";
    $calendar .= "<a id='next-button' class='btn btn-primary btn-xs mx-1' href='?month=$next_month&year=$next_year&profid=$profileId'>Next <i class='fa-solid fa-angles-right'></i></a>";
    $calendar .= "</div>";

    $calendar .= "<div class='calendar-body'>";
    $calendar .= "<table class='table table-bordered'>";
    $calendar .= "<tr>";

    foreach ($days_of_week as $day) {
        $calendar .= "<th class='header-day'>$day</th>";
    }

    $calendar .= "</tr><tr>";

    $current_day = 1;

    if ($day_of_week > 0) {
        for ($k = 0; $k < $day_of_week; $k++) {
            $calendar .= "<td class='empty'></td>";
        }
    }
    function getSlotsAvailability($day_of_week) {
        include('../dbConn/conn.php');
        $query = "SELECT slots_available FROM slot_availability WHERE day_of_week = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('s', $day_of_week);
        $stmt->execute();
        $stmt->bind_result($slots_available);
        $stmt->fetch();
        $stmt->close();
    
        $total_reservations_query = "SELECT COUNT(*) FROM tblDeathRecord WHERE DAYOFWEEK(IntermentDateTime) = DAYOFWEEK(?)";
        $stmt_reservations = $conn->prepare($total_reservations_query);
        $stmt_reservations->bind_param('s', $day_of_week);
        $stmt_reservations->execute();
        $stmt_reservations->bind_result($total_reservations);
        $stmt_reservations->fetch();
        $stmt_reservations->close();
    
        $available_slots = max(0, $slots_available - $total_reservations);
    
        return $available_slots;
    }
    

    function countReservedSlots($date, $schedules)
    {
        $count = 0;
        foreach ($schedules as $schedule) {
            if (strpos($schedule, $date) === 0) {
                $count++;
            }
        }
        return $count;
    }
    
    while ($current_day <= $number_days) {
        if ($day_of_week == 7) {
            $day_of_week = 0;
            $calendar .= "</tr><tr>";
        }

        $current_day_rel = str_pad($current_day, 2, "0", STR_PAD_LEFT);
        $date = "$year-$month-$current_day_rel";
    
        $today = $date == date('Y-m-d') ? 'today' : '';
        $day_name = strtolower(date('l', strtotime($date)));
        // $slots_available = getSlotsAvailability($day_name);

        switch ($day_name) {
            case 'monday':
                $calendar .= "<td class='$today'><h4 class='current_day_notavailable'>$current_day</h4><button class='btn btn-secondary btn-sm disabled'>Not Available</button></td>";
                break;
            case 'tuesday':
            case 'wednesday':
            case 'thursday':
            case 'friday':
                $slots_available = getSlotsAvailability($day_name);
        
                if (in_array($date, $schedules)) {
                    $calendar .= "<td class='$today'><h4 class='current_day'>$current_day</h4><button class='btn btn-danger btn-sm disabled'>Reserved</button></td>";
                } elseif ($date < $date_today) {
                    $calendar .= "<td><h4 class='current_day_notavailable'>$current_day</h4><button class='btn btn-secondary btn-sm disabled'>Not Available</button></td>";
                } else {
                    $user_selected_date = "SELECT COUNT(*) as count FROM tblDeathRecord WHERE DATE(IntermentDateTime) = ?";
                    $stmt = $conn->prepare($user_selected_date);
                    $stmt->bind_param('s', $date);
                    $stmt->execute();
        
                    if ($stmt) {
                        $stmt->store_result();
                        $stmt->bind_result($selectedDateCount);
                        $stmt->fetch();
        
                        $slots_left = max(0, $slots_available - $selectedDateCount);
                        $button_color = $slots_left > 0 ? 'btn-success' : 'btn-secondary';
                        $button_text = $slots_left > 0 ? "Select Date ($slots_left slots left)" : "Slots Full";
        
                        $calendar .= "<td class='$today'><h4 class='current_day'>$current_day</h4>";
                        $calendar .= " <a href='../dbConn/schedule-date.php?date=$date&id=$profileId' class='btn $button_color btn-sm'>$button_text</a> ";
                        $calendar .= "</td>";
                    } else {
                        die("Database query error: " . $conn->error);
                    }
                }
                break;
            case 'saturday':
            case 'sunday':
                $slots_available = getSlotsAvailability($day_name);
        
                if (in_array($date, $schedules)) {
                    $calendar .= "<td class='$today'><h4 class='current_day'>$current_day</h4><button class='btn btn-danger btn-sm disabled'>Reserved</button></td>";
                } elseif ($date < $date_today) {
                    $calendar .= "<td><h4 class='current_day_notavailable'>$current_day</h4><button class='btn btn-secondary btn-sm disabled'>Not Available</button></td>";
                } else {
                    $user_selected_date = "SELECT COUNT(*) as count FROM tblDeathRecord WHERE DATE(IntermentDateTime) = ?";
                    $stmt = $conn->prepare($user_selected_date);
                    $stmt->bind_param('s', $date);
                    $stmt->execute();
        
                    if ($stmt) {
                        $stmt->store_result();
                        $stmt->bind_result($selectedDateCount);
                        $stmt->fetch();
        
                        $slots_left = max(0, $slots_available - $selectedDateCount);
                        $button_color = $slots_left > 0 ? 'btn-success' : 'btn-secondary';
                        $button_text = $slots_left > 0 ? "Select Date ($slots_left slots left)" : "Slots Full";
        
                        $calendar .= "<td class='$today'><h4 class='current_day'>$current_day</h4>";
                        $calendar .= " <a href='../dbConn/schedule-date.php?date=$date&id=$profileId' class='btn $button_color btn-sm'>$button_text</a> ";
                        $calendar .= "</td>";
                    } else {
                        die("Database query error: " . $conn->error);
                    }
                }
                break;
        }
        

    
        $current_day++;
        $day_of_week++;
    }

    $calendar .= "</table>";
    $calendar .= "</div>";

    return $calendar;
}
?>


<div class="banner">
    <div class="container">
        <div class="row mt-100">
            <div class="col-md-12">
                <div class="scheduling-container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card-scheduling-1" style="height: 80vh;">
                                <div class="col-md-12">
                                    <?php
                                    $date_components = getdate();
                                    // var_dump($date_components);
                                    if(isset($_GET['month']) && isset($_GET['year'])){
                                        $month = $_GET['month'];
                                        $year = $_GET['year'];
                                    }else{
                                        $month = $date_components['mon'];
                                        $year = $date_components['year'];
                                    }

                                    echo build_calendar($month, $year);
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>