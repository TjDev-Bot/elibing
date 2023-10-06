<?php
    include "conn.php";
    session_start();
    if (isset($_SESSION['id'])) {
        $id = $_SESSION['id'];
        $lname = $_SESSION['lname'];
        $fname = $_SESSION['fname'];
        $midname = $_SESSION['midname'];
        // $role = $_SESSION['role'];
    }
    if(isset($_GET['date']) ){
        $date = $_GET['date'];
        $name = $_GET['name'];
    }

   
    
    if(isset($_POST['submit'])){
        $time = $_POST['time'];
        $userId = $_POST['uid'];
        $sql = "INSERT INTO schedule(user_id, date, time,status) VALUES ('$userId', '$date','$time', 'selected')";
        $result = mysqli_query($conn, $sql);
            if($result) {
                header('location: ../client/orderpayment.php?id='.$id.'&name='.$name);
            }
        }
    

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Selected Schedule</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
    body {
        background-color: #2655f0;
        font-family: Arial, sans-serif;
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;


    }

    .card {
        border: none;
        border-radius: 10px;
        background-color: rgba(255, 255, 255, 0.85);
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        backdrop-filter: blur(11.5px);
        -webkit-backdrop-filter: blur(11.5px);
        padding: 20px;
        box-shadow: 2px 2px 56px 7px rgba(0, 0, 0, 0.75);
        -webkit-box-shadow: 2px 2px 56px 7px rgba(0, 0, 0, 0.75);
        -moz-box-shadow: 2px 2px 56px 7px rgba(0, 0, 0, 0.75);
    }

    .card-title {
        text-align: center;
        font-size: 24px;
        font-weight: bold;
        color: #333;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
    }

    select.form-control {
        font-size: 16px;
        height: 48px;
    }

    .btn-primary {
        background-color: #2655f0;
        border: none;
    }

    .btn-primary:hover {
        background-color: #1a3ec4;
    }

    .typewriter {
        font-size: 20px;
        overflow: hidden;
        white-space: nowrap;
        margin: 0 auto;
        letter-spacing: 0.1em;
        animation: typing 3.5s steps(40, end), blink-caret 0.5s step-end infinite;
        color: #333;
        font-weight: bold;
    }

    @keyframes typing {
        from {
            width: 0;
        }

        to {
            width: 100%;
        }
    }

    @keyframes blink-caret {

        from,
        to {
            border-color: transparent;
        }

        50% {
            border-color: #333;
        }
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="card col-md-4">
            <h1 class="card-title typewriter">Confirm Selected Schedule</h1>
            <form method="post" action="" autocomplete="off">
                <button type="button" class="btn btn-danger btn-block" onclick="goBack()">Back</button>

                <input type="hidden" name="uid" value="<?php echo $id ?>">
                <div class="form-group">
                    <label for="date_text">Interment Date</label>
                    <input type="text" class="form-control" id="date_text" aria-describedby="emailHelp" disabled
                        value="<?php echo date('F d, Y', strtotime($date)); ?>">
                </div>
                <div class="form-group">
                    <label for="time">Choose Time for Interment</label>
                    <select name="time" class="form-control" id="time">
                        <option selected disabled>Choose Time for Interment</option>
                        <option value="10:00 AM">10:00 AM</option>
                        <option value="11:00 AM">11:00 AM</option>
                        <option value="12:00 PM">12:00 PM</option>
                        <option value="1:00 PM">1:00 PM</option>
                        <option value="2:00 PM">2:00 PM</option>
                        <option value="3:00 PM">3:00 PM</option>
                    </select>
                </div>
                <button type="submit" name="submit" class="btn btn-primary btn-block">Confirm Date & Time</button>
            </form>
        </div>
    </div>
    <script>
    function goBack() {
        window.history.back();
    }
    </script>
</body>

</html>