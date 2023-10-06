<!DOCTYPE html>
<html lang="en" dir="ltr">
<link rel="stylesheet" href="css/available.css">

<?php
include('component/header.php');
include('component/navbar.php');
?>


<body>
    <div class="container-burial">
        <h1 class="niche">Interment Date Availability</h1>
        <div class="formbold-main-wrapper">
            <div class="formbold-form-wrapper">
                <label class="formbold-form-label formbold-form-label-2">

                    <hr>Deceased Profile
                </label>
                <form action="home.php" method="POST">
                    <div class="formbold-mb-5">
                        <label for="name" class="formbold-form-label"> Name of the Deceased </label>
                        <input type="text" name="name" id="name" placeholder="Enter Full Name"
                            class="formbold-form-input" />
                    </div>
                    <div class="formbold-mb-5">
                        <label for="phone" class="formbold-form-label"> Date of Death </label>
                        <input type="text" name="phone" id="phone" placeholder="mm/dd/yy"
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
                                            <option value="b6">Calumpang</option>
                                            <option value="b7">City Heights</option>
                                            <option value="b8">Conel</option>
                                            <option value="b9">Dadiangas East</option>
                                            <option value="b10">Dadiangas North</option>
                                            <option value="b11">Dadiangas South</option>
                                            <option value="b12">Dadiangas West</option>
                                            <option value="b13">Fatima</option>
                                            <option value="b14">Katangawan</option>
                                            <option value="b15">Labangal</option>
                                            <option value="b16">Lagao</option>
                                            <option value="b17">Ligaya</option>
                                            <option value="b18">Mabuhay</option>
                                            <option value="b19">Olympog</option>
                                            <option value="b20">San Isidro</option>
                                            <option value="b21">San Jose</option>
                                            <option value="b22">Siguel</option>
                                            <option value="b23">Sinawal</option>
                                            <option value="b24">Tambler</option>
                                            <option value="b25">Tinagacan</option>
                                            <option value="b26">Uper Labay</option>
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

                    <label class="formbold-form-label formbold-form-label-2">
                        <hr>Select Desired Date
                    </label>
                    <div class="formbold-mb-5 flex  ">
                        <div class="formbold-mb-5 w-full  ">
                            <label for="date" class="formbold-form-label"> Date </label>
                            <input type="date" name="date" id="date" class="formbold-form-input" />
                        </div>
                        <div class="formbold-mb-5 w-full  formbold-px-3">
                            <label for="time" class="formbold-form-label"> Time </label>
                            <input type="time" name="time" id="time" class="formbold-form-input" />
                        </div>
                    </div>

                    <div>
                        <a class="formbold-btn"  href="billing.php">Next</a>
                    </div>
                </form>
            </div>
        </div>
    </div>



</body>

</html>