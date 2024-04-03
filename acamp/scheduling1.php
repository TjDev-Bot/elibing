<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
<style>

</style>

<?php

function build_calendar($month, $year){
    include('../dbConn/conn.php');
    $sql = "SELECT * FROM tblDeathRecord WHERE MONTH(IntermentDateTime) = '$month' AND YEAR(IntermentDateTime) = '$year'";
    $schedules = array();
    $result = $conn->query($sql);
    if($result){
        $count = $result->num_rows;
        if($count > 0){
            while($row = $result->fetch_assoc()){
                $schedules[] = $row['IntermentDateTime'];
            }
        }
    }

     $days_of_week = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
     
     $first_day_of_month = mktime(0,0,0,$month,1,$year);
     $number_days = date('t', $first_day_of_month);
     $date_components = getdate($first_day_of_month);
     $month_name = $date_components['month'];
     $day_of_week = $date_components['wday'];
     $date_today = date('Y-m-d');

     $prev_month = date('m', mktime(0,0,0, $month-1, 1, $year));
     $prev_year = date('Y', mktime(0,0,0, $month-1, 1, $year));
     $next_month = date('m', mktime(0,0,0, $month+1, 1, $year));
     $next_year = date('Y', mktime(0,0,0, $month+1, 1, $year));

     if(isset($_GET['profid'])){
        $profileId = $_GET['profid'];

    }
     $calendar = "<center class='month-sched'><h2>$month_name $year</center></h2></center>";
     $calendar.= "<div class='text-center'>";
     $calendar.= "<a class='btn btn-primary btn-xs mx-1' href='?month=".$prev_month."&year=".$prev_year."&profid=".$profileId."'><i class='fa-solid fa-angles-left'></i> Prev</a>";
     $calendar.= "<a class='btn btn-primary btn-xs mx-1' href='?month=".date('m')."&year=".date('Y')."&profid=".$profileId."'>Current Month</a>";
     $calendar.= "<a id='next-button' class='btn btn-primary btn-xs mx-1' href='?month=".$next_month."&year=".$next_year."&profid=".$profileId."'>Next <i class='fa-solid fa-angles-right'></i></a>";
     $calendar.= "</div>";

    $calendar.="<div class='calendar-body'>";
    $calendar.= "<table class='table table-bordered'>";
    $calendar.= "<tr>";

    foreach($days_of_week as $day){
        $calendar.="<th class='header-day'>$day</th>";
     }

     $calendar.= "</tr><tr>";

     $current_day = 1;

    if($day_of_week > 0){
        for($k=0; $k<$day_of_week; $k++){
            $calendar.="<td class='empty'></td>";
        }
    }

    $month = str_pad($month, 2, "0", STR_PAD_LEFT);
    if(isset($_GET['id'])){
        $profileId = $_GET['id'];

    }
    
    while($current_day <= $number_days){
        // if seventh column (saturday) reached, start a new row
        if($day_of_week == 7){
            $day_of_week = 0;
            $calendar.="</tr></tr>";
        }
    
        $current_day_rel = str_pad($current_day, 2, "0", STR_PAD_LEFT);
        $date = "$year-$month-$current_day_rel";
    
        $day_name = strtolower(date('I', strtotime($date)));
        $today = $date == date('Y-m-d') ? 'today' : '';
        
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
                $selectedDateCount = $stmt->num_rows;
            
                if ($selectedDateCount >= 0) {
                    $calendar .= "<td class='$today'><h4 class='current_day'>$current_day</h4>";
                    $calendar .= " <a href='../dbConn/special-date.php?date=" . $date . "&id=" . $profileId . "' class='btn btn-success btn-sm'>Select Date</a> ";
                    $calendar .= "</td>";                    
                } else {
                    $calendar .= "<td class='$today'><h4 class='current_day'>$current_day</h4>";
                    $calendar .= " <a href='../dbConn/special-date.php?date=" . $date . "&id=" . $profileId . "' class='btn btn-success btn-sm'>Select Date</a> ";
                    $calendar .= "</td>";
                }
            } else {
                die("Database query error: " . $conn->error);
            }
        }
    
        $current_day++;
        $day_of_week++;
    }
    
    $calendar.= "</table>";
    $calendar.= "</div>";

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
                            <div class="card-scheduling-1">
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
