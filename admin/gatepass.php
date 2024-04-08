<!DOCTYPE html>
<html lang="en">

<?php
require('assets/component/header.php');
require('assets/component/topnavbar.php');
require('assets/component/sidebars.php');
<<<<<<< HEAD

include '../dbConn/conn.php';
if (isset($_GET['profid']) && isset($_GET['gatepass'])) {
    $profid = $_GET['profid'];
    $gatepass = $_GET['gatepass'];
=======
<<<<<<< HEAD

include '../dbConn/conn.php';
=======
include '../dbConn/conn.php';

>>>>>>> c9be5642966b076214c66ae87a16a96449635e9f
if(isset($_GET['profid'])){
    $profid = $_GET['profid'];
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed


    $selectreserve = "SELECT * FROM  tblNiche
    INNER JOIN tblIntermentReservation ON  tblNiche.Nid =  tblIntermentReservation.Nid
    INNER JOIN tblNicheLocation ON tblNiche.LocID = tblNicheLocation.LocID
    INNER JOIN tblDeathRecord ON tblIntermentReservation.ProfID = tblDeathRecord.ProfileID WHERE tblIntermentReservation.ProfID = '$profid'";
    $queryreserve = $conn->query($selectreserve);
<<<<<<< HEAD
    while ($dataloc = $queryreserve->fetch_assoc()) {

        $requestor = $dataloc['Requestor'];
        $name = $dataloc['Fname'] . ' ' . $dataloc['Mname'] . ' ' . $dataloc['Lname'];
=======
    while ($dataloc = $queryreserve->fetch(PDO::FETCH_ASSOC)) {
        
        $requestor = $dataloc['Requestor'];
        $name = $dataloc['Fname'].' '.$dataloc['MName'].' '.$dataloc['Lname'];
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
        $nicheno = $dataloc['Nno'];
        $intermentdate = $dataloc['IntermentDateTime'];
        $nichelocaion = $dataloc['NLName'];
        $size = $dataloc['Size'];
        $description = $dataloc['Description'];
        $type = $dataloc['Type'];
        $level = $dataloc['Level'];
    }
}
?>

<body>
<<<<<<< HEAD
    <center>
        <div class="bg">
            <button class="btn btn-primary btn-print" id="printButton">
                <i class='bx bx-printer'></i>
            </button>
            <div class="card">
                <span class="card__success"><i class="ion-checkmark"></i></span>
                <div class="passlogo">
                    <img src="../image/gensanlogo.png" alt="logo" class="passlogo" width="80px" style="display: flex; justify-content:center; margin: 0 auto;">
                    <h1 class="card__msg" style="text-align:center;">GATE PASS</h1>
                    <h3 class="card__submsg">Antonio C. Acharon Memorial Park, Brgy. Fatima,GSC</h3>
                    <h3>
                        Requestor : <?php echo $requestor ?>
                    </h3>
                    <h3>
                        Deceased Name : <?php echo ucfirst($name) ?>
                    </h3>
                    <h3>
                        Interment Date & Time : <?php echo date('F j, Y', strtotime($intermentdate)); ?>
                    </h3>
                    <h3>
                        Niche No : <?php echo $nicheno ?>
                    </h3>
                    <h3>
                        Level : <?php echo $level ?>
                    </h3>

                    <h3>
                        Niche Location : <?php echo $nichelocaion ?>
                    </h3>

                    <h3>
                        Gatepass No : <?php echo $gatepass ?>
                    </h3>
=======

    <center>
        <div class="bg">
            <button class="btn btn-primary btn-print " id="printButton">
                <i class='bx bx-printer'></i>
            </button>
            <div class="card">

                <span class="card__success"><i class="ion-checkmark"></i></span>

                <h1 class="card__msg">GATE PASS</h1>
                <h3 class="card__submsg">Antonio C. Acharon Memorial Park, Brgy. Fatima,GSC</h3>
                <h3>
                    Requestor : <?php echo $requestor ?>
                </h3>
                <h3>
                    Deceased Name : <?php echo $name ?>
                </h3>
                <h3>
                    Interment Date & Time : <?php echo $intermentdate ?>
                </h3>
                <h3>
                    Niche Location : <?php echo $nicheno ?>
                </h3>
                <h3>
                    Niche Location : <?php echo $nichelocaion ?>
                </h3>
                <h3>
                   Level : <?php echo $level ?>
                </h3>
               
                <button type="button" class="formbold-btn-next" name="next" id="doneButton"
                    onclick="window.location.href='intermentSched.php'">Done</button>
                <div class="card__body">

                </div>
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed

                </div>
            </div>
        </div>
    </center>
<<<<<<< HEAD
    <button type="button" class="formbold-btn-next btn-done" name="next" id="doneButton" style="width: 20vw;justify-content:center; margin: auto 45%;" onclick="next()">Done</button>
=======
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
</body>
<script>
    function next() {
        var url = 'intermentSched.php';
        window.location.href = url;
    }
</script>
<style>

<<<<<<< HEAD
    center {
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 20px auto;
        margin-left: 50px;
    }

    .bg {

        background-color:primary-color;
        width: 70vw;
        overflow: hidden;
        margin: 0 auto;
        box-sizing: border-box;
        padding: 40px;
        font-family: 'Roboto';
        margin-top: 40px;
=======
<style>
center {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 200px;
}

primary-col=#6C7BEE .bg {

    background-color: primary-col;
    width: 480px;
    overflow: hidden;
    margin: 0 auto;
    box-sizing: border-box;
    padding: 40px;
    font-family: 'Roboto';
    margin-top: 40px;
}

.card {

    background-color: white;
    width: 100%;
    float: left;
    margin-top: 40px;
    border-radius: 5px;
    box-sizing: border-box;
    padding: 80px 30px 25px 30px;
    text-align: center;
    position: relative;

    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12),
    0 1px 2px rgba(0, 0, 0, 0.24) &__success {
        position: absolute;
        top: -50px;
        left: 145px;
        width: 100px;
        height: 100px;
        border-radius: 100%;
        background-color: #60c878;
        border: 5px solid white;

        i {
            color: white;
            line-height: 100px;
            font-size: 45px;
        }
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
    }

    &__msg {
        text-transform: uppercase;
        color: #55585b;
        font-size: 18px;
        font-weight: 500;
        margin-bottom: 5px;
    }

    &__submsg {
        color: #959a9e;
        font-size: 16px;
        font-weight: 400;
        margin-top: 0px;
    }

    &__body {
        background-color: #f8f6f6;
        border-radius: 4px;
        width: 100%;
        margin-top: 30px;
        float: left;
<<<<<<< HEAD
        margin-top: 3%;
        border-radius: 5px;
        box-sizing: border-box;
        border-style: solid;
        border-color: black;
        padding: 40px 30px 25px 30px;
        text-align: left;
=======
        box-sizing: border-box;
        padding: 30px;
    }

    &__avatar {
        width: 50px;
        height: 50px;
        border-radius: 100%;
        display: inline-block;
        margin-right: 10px;
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
        position: relative;
        top: 7px;
    }

<<<<<<< HEAD

        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12),
        0 1 px 2 px rgba(0, 0, 0, 0.24) ; __success
        {
            position: absolute;
            top: -50px;
            left: 145px;
            width: 100px;
            height: 100px;
            border-radius: 100%;
            background-color: #60c878;
            border: 5px solid white;
=======
    &__recipient-info {
        display: inline-block;
    }
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed

    &__recipient {
        color: #232528;
        text-align: left;
        margin-bottom: 5px;
        font-weight: 600;
    }

<<<<<<< HEAD
        .passlogo {
            place-items: center;

        }

        &__msg {
            text-transform: uppercase;
            color: #55585b;
            text-align: center;
            font-size: 18px;
            font-weight: 500;
            margin-bottom: 5px;
            text-align: center;
            position: relative;

        }

        & __submsg {
            color: #959a9e;
            font-size: 16px;
            font-weight: 400;
            margin-top: 0px;
            text-align: left;
        }

        &__body {
            background-color: #f8f6f6;
            border-radius: 4px;
            width: 100%;
            margin-top: 30px;
            float: left;
            box-sizing: border-box;
            padding: 30px;
        }

        & __avatar {
            width: 50px;
            height: 50px;
            border-radius: 100%;
            display: inline-block;
            margin-right: 10px;
            position: relative;
            top: 7px;
        }

        & __recipient-info {
            display: inline-block;
        }

        & __recipient {
            color: #232528;
            text-align: left;
            margin-bottom: 5px;
            font-weight: 600;
        }

        &__email {
            color: #838890;
            text-align: left;
            margin-top: 0px;
        }

        & __price {
            color: #232528;
            font-size: 70px;
            margin-top: 25px;
            margin-bottom: 30px;

            span {
                font-size: 60%;
            }
        }

        &__method {
            color: #d3cece;
            text-transform: uppercase;
            text-align: left;
            font-size: 11px;
            margin-bottom: 5px;
        }

        & __payment {
            background-color: white;
            border-radius: 4px;
            width: 100%;
            height: 100px;
            box-sizing: border-box;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        & __credit-card {
            width: 50px;
            display: inline-block;
            margin-right: 15px;
        }

        & __card-details {
            display: inline-block;
            text-align: left;
        }

        & __card-type {
            text-transform: uppercase;
            color: #232528;
            font-weight: 600;
            font-size: 12px;
            margin-bottom: 3px;
        }

        &__card-number {
            color: #838890;
            font-size: 12px;
            margin-top: 0px;
        }

        & __tags {
            clear: both;
            padding-top: 15px;
        }

        & __tag {
            text-transform: uppercase;
            background-color: #f8f6f6;
            box-sizing: border-box;
            padding: 3px 5px;
            border-radius: 3px;
            font-size: 10px;
            color: #d3cece;
        }
    }

    @media print {

        .sb-topnav,
        .sb-sidenav {
            display: none;
        }


        #printButton,
        #doneButton {
            display: none;
        }

        @page {
            size: A4;
            margin: 0;
        }

        body {
            width:130%;
            height: auto;
            margin-left: -10em;
        }
    }

    .btn-done {
        translate: transform ease-in-out .2s;
        margin-top: auto;
        background-color: blue;
        color: white;
    }

    .btn-done:hover {
        transform: scale(0.9);
        color: white;
        background-color:#6a64f1;
    }
</style>
<script>
    document.getElementById("printButton").addEventListener("click", function() {
        window.print();
    });
=======
    &__email {
        color: #838890;
        text-align: left;
        margin-top: 0px;
    }

    &__price {
        color: #232528;
        font-size: 70px;
        margin-top: 25px;
        margin-bottom: 30px;

        span {
            font-size: 60%;
        }
    }

    &__method {
        color: #d3cece;
        text-transform: uppercase;
        text-align: left;
        font-size: 11px;
        margin-bottom: 5px;
    }

    &__payment {
        background-color: white;
        border-radius: 4px;
        width: 100%;
        height: 100px;
        box-sizing: border-box;
        display: flex;
        align-items: center;
        justify-content center;
    }

    &__credit-card {
        width: 50px;
        display: inline-block;
        margin-right: 15px;
    }

    &__card-details {
        display: inline-block;
        text-align: left;
    }

    &__card-type {
        text-transform: uppercase;
        color: #232528;
        font-weight: 600;
        font-size: 12px;
        margin-bottom: 3px;
    }

    &__card-number {
        color: #838890;
        font-size: 12px;
        margin-top: 0px;
    }

    &__tags {
        clear: both;
        padding-top: 15px;
    }

    &__tag {
        text-transform: uppercase;
        background-color: #f8f6f6;
        box-sizing: border-box;
        padding: 3px 5px;
        border-radius: 3px;
        font-size: 10px;
        color: #d3cece;
    }
}

@media print {

    .sb-topnav,
    .sb-sidenav {
        display: none;
    }


    #printButton,
    #doneButton {
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
document.getElementById("printButton").addEventListener("click", function() {
    window.print();
});
>>>>>>> a09fe95424795c2918695e59905a4f9ecb5f1eed
</script>