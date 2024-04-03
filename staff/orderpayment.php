<!DOCTYPE html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
</script>
<?php
require('assets/component/header.php');
require('assets/component/topnavbar.php');
require('assets/component/sidebars.php');
include "../dbConn/conn.php";

if (isset($_GET['profid'])) {
    $profid = $_GET['profid'];
}
$select = "SELECT * FROM  tblNiche
INNER JOIN tblIntermentReservation ON  tblNiche.Nid =  tblIntermentReservation.Nid
INNER JOIN tblNicheLocation ON tblNiche.LocID = tblNicheLocation.LocID
INNER JOIN tblDeathRecord ON tblIntermentReservation.ProfID = tblDeathRecord.ProfileID WHERE tblIntermentReservation.ProfID = '$profid'";
$query = $conn->query($select);

function generateGatePassNumber() {
    return rand(100000, 999999); 
}
$gatePassNumber = generateGatePassNumber();
$_SESSION['gatePassNumber'] = $gatePassNumber;
$userid = $_SESSION['id'];
?>

<body>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active" id="order">
                            <h1>Order Payment</h1>

                        </li>
                    </ol>
                    <div class="relative shadow-md sm:rounded-lg">
                        <button class="btn btn-primary btn-print d-print-none" id="printButton">
                            <i class='bx bx-printer'></i>
                        </button>

                        <?php
                        if (isset($_GET['profid'])) {
                            $profid = $_GET['profid'];
                        }
                        ?>




                        <?php
                        while ($data = $query->fetch_assoc()) {
                            $birth = $data['Birthydate'];
                            $requestor = $data['Requestor'];
                            $name = $data['Fname'].' '.$data['Mname'].' '.$data['Lname'];
                            $intermentdate = $data['IntermentDateTime'];
                            $nicheno = $data['Nno'];
                            $nichelocaion = $data['NLName'];
                            $level = $data['Level'];


                            $birthDate = new DateTime($birth);
                            $currentDate = new DateTime();
                            $age = $birthDate->diff($currentDate)->y;

                            $price = 0;
                            if ($age >= 0 && $age <= 17) {
                                $price = 2000.00;
                                $string = 'Child';
                                $string1 = 'No less';
                            } elseif ($age >= 18 && $age <= 59) {
                                $price = 3000.00;
                                $string = 'Adult';
                                $string1 = 'No less';

                            } elseif ($age >= 60) {
                                $price = 2400.00;
                                $string = 'Senior Citizen';
                                $string1 = '20% less';


                            }
                            ?>

                        <h3 style=""><?php echo 'Requestor Name : '.$requestor ?></h3>
                        <h3 style=""><?php echo 'Deceased Name : '.$name ?></h3>
                        <h3 style=""> Interment Date & Time :
                            <?php echo date('F j, Y H:s A', strtotime($intermentdate)); ?>
                        </h3>
                        <h3 style=""><?php echo 'Niche Location : '.$nichelocaion ?></h3>
                        <h3 style=""><?php echo 'Niche No : '.$nicheno ?></h3>
                        <h3 style=""><?php echo 'Level : '.$level ?></h3>




                        <div class="row">
                            <?php if($string != 'Senior Citizen' && $age != 0) { ?>

                            <div class="col mr-2">
                                <div class="card card2" id="yesCard" onclick="selectOption('yes')">
                                    <label for="isPWD">Person with Disability (PWD): 20% less</label>
                                    <input type="radio" name="isPWD" value="yes" style="display: none;" checked>
                                    <span id="yesText">Yes</span>
                                </div>
                            </div>

                            <div class="col mr-2">
                                <div class="card card2" id="noCard" onclick="selectOption('no')">
                                    <label for="isPWD">Person with Disability (PWD): No less</label>
                                    <input type="radio" name="isPWD" value="no" style="display: none;">
                                    <span id="noText">No</span>
                                </div>
                            </div>

                            <?php } ?>
                        </div>
                        <center>
                            <?php if($string != 'Child') {?>
                            <div class="col mr-2">
                                <div class="card">
                                    <?php if($string == 'Senior Citizen') {?>

                                    <h6><?php echo $string?></h6>
                                    <h6>Apartment Type Niche</h6>
                                    <h4><?php echo $price ?></h4>
                                    <?php } else {?>
                                    <h6><?php echo $string?></h6>
                                    <h6>Apartment Type Niche</h6>
                                    <h4><?php echo $price ?></h4>
                                    <?php } ?>

                                </div>
                            </div>
                            <?php } elseif($age >= 1 && $age <= 17){ ?>
                            <div class="col mr-2">
                                <div class="card">
                                    <h6>Child Burial (17 and below)</h6>
                                    <h6>Apartment Type Niche</h6>
                                    <h4>2000.00</h4>

                                </div>
                            </div>
                            <?php }elseif($age == 0) { ?>
                            <div class="col mr-2">
                                <div class="card">
                                    <h6>Child Burial (0 age-Vault)</h6>
                                    <h6>Apartment Type Niche</h6>
                                    <h4>2000.00</h4>

                                </div>
                            </div>
                            <?php } ?>
                            <div class="col mr-2">
                                <div class="card">
                                    <h4 style="color: green;">Total Price</h4>
                                    <label id="pwdLabel" for="isPWD">Person with Disability (PWD): 20% less</label>
                                    <h4 id="nicheAmount" style="color: green;"><?php echo $price.'.00' ?></h4>
                                </div>
                            </div>

                        </center>

                        <br>
                        <center>
                            <form action="../dbConn/orderpayment1.php" method="POST">
                                <input type="hidden" name="userid" value="<?php echo $userid ?>">
                                <input type="hidden" name="name" value="<?php echo $requestor ?>">
                                <input type="hidden" name="totalprice" id="nicheAmount1" style="color: green;"
                                    value="<?php echo $price.'.00' ?>"></input>
                                <input type="hidden" name="profID" value="<?php echo $profid ?>">
                                <input type="hidden" name="gatepassno" value="<?php echo $gatePassNumber ?>">
                                <button class="btn btn-success" type="submit" name="paymentButton"
                                    id="payButton">Paid</button>
                            </form>

                        </center>


                        <?php } ?>

                        <script>
                        function selectOption(option) {
                            var yesCard = document.getElementById('yesCard');
                            var noCard = document.getElementById('noCard');
                            var yesRadio = document.querySelector('input[name="isPWD"][value="yes"]');
                            var noRadio = document.querySelector('input[name="isPWD"][value="no"]');
                            var pwdLabel = document.getElementById('pwdLabel');
                            var nicheAmount = <?php echo $price; ?>;

                            if (option === 'yes') {
                                yesCard.classList.add('selected');
                                noCard.classList.remove('selected');
                                yesRadio.checked = true;
                                noRadio.checked = false;

                                nicheAmount *= 0.8;

                                pwdLabel.style.display = 'block';
                            } else {
                                noCard.classList.add('selected');
                                yesCard.classList.remove('selected');
                                noRadio.checked = true;
                                yesRadio.checked = false;

                                pwdLabel.style.display = 'none';
                            }

                            document.getElementById('nicheAmount').innerText = nicheAmount.toFixed(2);
                            document.getElementById('nicheAmount1').value = nicheAmount.toFixed(2);


                        }

                        function handlePrint() {
                            var yesRadio = document.querySelector('input[name="isPWD"][value="yes"]');
                            if (yesRadio && yesRadio.checked) {
                                selectOption('yes');
                            } else {
                                selectOption('no');
                            }

                            // Trigger print dialogue
                            window.print();

                            // Ensure the original state is restored after printing
                            setTimeout(() => window.location.reload(), 1000);
                        }

                        document.getElementById("printButton").addEventListener("click", handlePrint);


                        document.getElementById("printButton").addEventListener("click", handlePrint);

                        function view(profid, gatepass) {
                            var url = 'gatepass.php?profid=' + profid + '&gatepass=' + gatepass;
                            window.location.href = url;
                        }
                        </script>


                    </div>
                </div>
            </main>
        </div>
    </div>


    <?php
    require('assets/component/script.php');
    ?>

</body>

</html>
<style>
@media print {
    .sb-topnav,
    .sb-sidenav,
    #startDate,
    #endDate,
    #printButton,
    #payButton,
    #order,
    #yesCard,
    #noCard,
    #filter-button {
        display: none;
    }

    .card2 {
        display: none;
    }

    @page {
        size: LETTER;
        margin: 0;
    }

    body {
        margin: 0;
    }
}


#pwdLabel {
    display: none;
    color: green;
}

.card {
    height: 120px;
    background-color: #f0f0f0;
    padding: 20px;
    border-radius: 10px;
    transition: transform 0.3s;
    display: flex;
}

.card2 {
    width: 35vw;
    height: 120px;
    background-color: #f0f0f0;
    padding: 20px;
    border-radius: 10px;
    transition: transform 0.3s;
    display: flex;
}

.card.selected {
    border: 2px solid green;
}

.card2:hover {
    transform: scale(1.1);
}

.card:hover .choices {
    display: block;
}

h6 {
    font-size: 12px;
}
</style>