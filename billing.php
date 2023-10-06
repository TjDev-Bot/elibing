<!DOCTYPE html>
<html lang="en" dir="ltr">
<link rel="stylesheet" href="css/billing.css">

<?php
include('component/header.php');
include('component/navbar.php');
?>



<body>
    <div class="container-burial">
        <h1 class="billing">Billing Form</h1>
        <div class="formbold-main-wrapper">
            <div class="formbold-form-wrapper">
                <label class="formbold-form-label formbold-form-label-2">

                    <hr>Profile
                </label>
                <form action="home.php" method="POST">
                    <div class="formbold-mb-5">
                        <label for="name" class="formbold-form-label"> Full Name </label>
                        <input type="text" name="name" id="name" placeholder="Enter your Full Name"
                            class="formbold-form-input" />
                    </div>
                    <div class="formbold-mb-5">
                        <label for="phone" class="formbold-form-label"> Phone Number </label>
                        <input type="text" name="phone" id="phone" placeholder="Enter your phone number"
                            class="formbold-form-input" />
                    </div>
                    <div class="formbold-mb-5">
                        <label for="relationship" class="formbold-form-label"> Relationship to the Deceased </label>
                        <input type="text" name="relationship" id="relationship" placeholder="e.g Daugther"
                            class="formbold-form-input" />
                    </div>

                    <hr>
                    <div class="flex flex-wrap formbold--mx-3">
                        <div class="w-full sm:w-half formbold-px-3">
                            <div class="formbold-mb-5">
                                <label class="formbold-form-label formbold-form-label-2">
                                    Address Details
                                </label>
                            </div>
                            <div class="formbold-mb-5 flex ">

                                <div class="formbold-mb-5 ">
                                    <div class="select">
                                        <select name="barangay" id="barangay">
                                            <option selected disabled>Choose your Barangay</option>
                                            <option value="b1">Apopong</option>
                                            <option value="b2">Baluan</option>
                                            <option value="b3">Batomelong</option>
                                            <option value="b4">Buayan</option>
                                            <option value="b5">Bula</option>
                                            <option value="b1">Calumpang</option>
                                            <option value="b2">City Heights</option>
                                            <option value="b3">Conel</option>
                                            <option value="b4">Dadiangas East</option>
                                            <option value="b5">Dadiangas North</option>
                                            <option value="b1">Dadiangas South</option>
                                            <option value="b2">Dadiangas West</option>
                                            <option value="b3">Fatima</option>
                                            <option value="b4">Katangawan</option>
                                            <option value="b5">Labangal</option>
                                            <option value="b1">Lagao</option>
                                            <option value="b2">Ligaya</option>
                                            <option value="b3">Mabuhay</option>
                                            <option value="b4">Olympog</option>
                                            <option value="b5">San Isidro</option>
                                            <option value="b5">San Jose</option>
                                            <option value="b1">Siguel</option>
                                            <option value="b2">Sinawal</option>
                                            <option value="b3">Tambler</option>
                                            <option value="b4">Tinagacan</option>
                                            <option value="b5">Uper Labay</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="formbold-mb-5  formbold-px-3">
                                    <div class="select">
                                        <select name="purok" id="purok">
                                            <option selected disabled>Choose Purok</option>
                                            <option value="prk1">Prk 1</option>
                                            <option value="prk2">Prk 2</option>
                                            <option value="prk3">Prk 3</option>
                                            <option value="prk4">Prk 4</option>
                                            <option value="prk5">Prk 5</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="formbold-mb-5  formbold-px-2">
                        <div class="select">
                            <select name="street" id="street">
                                <option selected disabled>Choose street</option>
                                <option value="st1">street 1</option>
                                <option value="st2">street 2</option>
                                <option value="st3">street 3</option>
                                <option value="st4">street 4</option>
                                <option value="st5">street 5</option>
                            </select>
                        </div>
                    </div>

                    <hr>
                    <label class="formbold-form-label formbold-form-label-2">
                        Payment
                    </label>
                    <div class="accept col-50">
                        <h3>We Accept E-Wallet Payments</h3>
                        <div class="icon-container">
                            <span class="icon-container">
                                <img width="90" height="45"
                                    src="https://orangemagazine.ph/wp-content/uploads/2022/05/GCASH-Logo.png"
                                    alt="gcash" />
                                <img width="55" height="50"
                                    src="https://play-lh.googleusercontent.com/MYVxoAAKgx1buBB-jn-U1wb8iUguAKwWH6EtfdT6l-zA_xqw2bxbHvycs25RXt9NZR4"
                                    alt="maya" />
                        </div>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <div class="formbold-mb-5">Enter Reference Number: </label>
                            <input type="text" name="ewallet" id="ewallet" placeholder="e.g 01XXXXXXXXXX"
                                class="formbold-form-input" />
                        </div>


                        <div>
                            <button class="formbold-btn" onclick="showSuccessMessage()">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
    function showSuccessMessage() {
        alert("Success! Your form has been submitted.");
    }
    </script>
</body>

</html>