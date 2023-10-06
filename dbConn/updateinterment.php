<?php
include('conn.php');
session_start();

$deceasedId = $_POST['uid'];

$role = $_POST['role'];
$user_id = $_POST['user_id'];
$user_name = $_POST['user_name'];
$relationship = $_POST['relationship'];
$barangay = $_POST['barangay'];
$purok = $_POST['purok'];
$deceased = $_POST['deceased'];
$age = $_POST['age'];
$deathdate = $_POST['deathdate'];
$ddate = $_POST['ddate'];
$time = $_POST['time'];

if (
    !empty($user_id) || !empty($user_name) || !empty($role) || !empty($relationship) || !empty($barangay) || !empty($purok) || !empty($deceased) || !empty($age) ||
    !empty($deathdate) || !empty($ddate) || !empty($time)
) {
    $update = "UPDATE intermentform SET 
        user_id = '{$user_id}' ,
        user_name = '{$user_name}',
        role = '{$role}',
        relationship = '{$relationship}',
        barangay = '{$barangay}',
        purok = '{$purok}',
        deceased = '{$deceased}',
        age = '{$age}',
        deathdate = '{$deathdate}',
        desired_date = '{$ddate}',
        desired_time = '{$time}',
        actions = 'Edit Appointment',
        cur_date_time = NOW()
        WHERE id = '{$deceasedId}' ";

    mysqli_query($conn, $update) or die(mysqli_error());
    echo "<script>if(confirm('Your Appointment Data is Updated')){document.location.href='../admin/viewappointment.php'};</script>";
}
?>