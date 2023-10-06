<?php
    if(isset($_SESSION['id'])){
        $user_id = $_SESSION['id'];
    }
?>
<link rel="stylesheet" href="assets/css/scheduling.css">
<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
<style>
.image-container {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px;
}

.btn-select {
    border: none;
    background: none;
}

.image-container img {
    max-width: 50%;
    height: auto;
    transition: transform all 0.2s ease;
}

.image-container img:hover {
    transform: scale(1.1);
    color: #9747FF;
}

.time-block {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    /* Align items to the right */
}


.header-day {
    font-size: 20px;
    border: none;
    color: #829CBC;
    font-family: Inter;
    font-style: normal;
    font-weight: 500;
    line-height: normal;
    width: 30px;

}

.current_day {
    color: #C9C4C4;
    text-align: right;
    font-family: Inter;
    font-style: normal;
    font-weight: 800;
    line-height: normal;
}

.current_day_notavailable {
    color: #C9C4C4;
    text-align: right;
    font-family: Inter;
    font-style: normal;
    font-weight: 800;
    line-height: normal;
}

#current_available_day {
    color: #2655f0;
    text-align: right;
    font-family: Inter;
    font-style: normal;
    font-weight: 800;
    line-height: normal;
}

.month-sched {
    text-transform: uppercase;
}

h6 {
    color: #60A554;
    text-align: right;
    font-family: Inter;
    font-size: 10px;
    font-style: normal;
    font-weight: 800;
    line-height: normal;
}


tr {
    border: 1px solid #327E9E;
    margin: 10px;
}

.calendar-body {
    margin: 10px;

}
</style>

<?php
function build_calendar($month, $year, $user_id){
    include('../dbConn/conn.php');
    $sql = "SELECT * FROM schedule WHERE MONTH(date) = '$month' AND YEAR(date) = '$year'";
    $schedules = array();
    $result = mysqli_query($conn, $sql);
    if($result){
        $count = mysqli_num_rows($result);
        if($count > 0){
            while($row = mysqli_fetch_assoc($result)){
                $schedule_id = $row['id'];
                $schedule_status = $row['status'];
                $schedules[] = $row['date'];
                $status = $row['status'];
                // echo '<pre>';
                // var_dump($schedules);
                // echo '</pre>';
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

     $calendar = "<center class='month-sched'><h2>$month_name $year</center></h2></center>";
     $calendar.= "<div class='text-center'>";
     $calendar.= "<a class='btn btn-primary btn-xs mx-1' href='?month=".$prev_month."&year=".$prev_year."'><i class='fa-solid fa-angles-left'></i> Prev</a>";
     $calendar.= "<a class='btn btn-primary btn-xs mx-1' href='?month=".date('m')."&year=".date('Y')."'>Current Month</a>";
     $calendar.= "<a class='btn btn-primary btn-xs mx-1' href='?month=".$next_month."&year=".$next_year."'><i class='fa-solid fa-angles-right'></i>Next</a>";
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
    if(isset($_GET['name'])){
        $name = $_GET['name'];
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
            if ($date < date('Y-m-d')) {
                $calendar .= "<td><h4 class='current_day_notavailable'>$current_day</h4><button class='btn btn-secondary btn-sm disabled'>Not Available</button></td>";
            } elseif (in_array($date, $schedules)) {
                $calendar .= "<td class='$today'><h4 class='current_day'>$current_day</h4><button class='btn btn-danger btn-sm disabled'>Reserved</button></td>";
            } else {
                $calendar .= "<td class='$today'><h4 class='current_day' id='current_available_day'>$current_day</h4>";
                $calendar .= " <a href='../dbConn/schedule-date.php?date=".$date."&name=".$name."' class='btn btn-success btn-sm'>Select Date</a> ";

                // $user_selected_date = "SELECT COUNT(*) as count FROM schedule WHERE user_id = $user_id AND date > '$date'";
                // $query = mysqli_query($conn, $user_selected_date);
            
                // if ($query) {
                //     $row = mysqli_fetch_assoc($query);
                //     $selectedDateCount = $row['count'];
            
                //     if ($selectedDateCount > 0) {
                //         $calendar .= "<button class='btn btn-success btn-sm disabled'>Select Date</button>";
                //     } else {
                //         $calendar .= "<button class='btn btn-success btn-sm select-date' data-toggle='modal' data-target='#dateModal' data-date='$date'>Select Date</button>";
                //     }
                // } else {
                //     die("Database query error: " . mysqli_error($conn));
                // }
            
                $calendar .= "</td>";
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
                <?php 
                        if(isset($_POST['submit'])){
                           
                            if(isset($_POST['sched_date'])){
                                echo $sched_date   = $_POST['sched_date'];
                            };

                           echo $sched_time = $_POST['sched_time'];

                           $sql = "UPDATE users SET
                           date = '{$sched_date}',
                           time = '{$sched_time}',
                           sched_status = 'fill_complete'
                           WHERE id = $user_id"; 

                           $result = mysqli_query($conn, $sql);

                           if($result){
                            header('location: scheduling-success.php');
                           }
       
                        }
                    ?>

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
                                                    
                                            echo build_calendar($month, $year, $user_id);
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- <div class="card-scheduling-2">
                                <div class="header-scheduling">
                                    <h4> <i class='bx bx-error'></i>
                                    </h4>
                                    <h4>Important Reminders: </h4>
                                    <hr>
                                </div>
                                <h4 class="subject">Subject to Holiday Rescheduling</h4>
                                <div class="reminders-scheduling">
                                    <p>
                                        Test dates may be affected by unexpected holidays or other
                                        similar circumstances; students should be prepared to reschedule
                                        accordingly.
                                    </p>
                                    <p>
                                        Please check your Email for sudden announcements.
                                    </p>

                                    <p>
                                        Thank you and Good luck!
                                    </p>
                                </div>
                                <h4 class="legend">Legend</h4>
                                <div class="legend-scheduling">
                                    <p>
                                        <span class="green-scheduling">GREEN</span> <span class="text-legend">-
                                            Available</span>
                                    </p>
                                    <p>
                                        <span class="orange-scheduling">ORANGE</span> <span class="text-legend">- Less
                                            than 5 slots left</span>
                                    </p>

                                    <p>
                                        <span class="red-scheduling">RED</span> <span class="text-legend">- Full
                                            Slots</span>
                                    </p>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>


            </div>

        </div>

    </div>
</div>