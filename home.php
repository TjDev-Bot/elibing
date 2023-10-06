<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="css/home.css">

<?php
require('component/header.php');
require('component/navbar.php');
?>

<style>
    .container-section {
        width: 70%;
    }

    .card-side {
        position: absolute;
        right: 10%;
        margin: auto;
        padding: auto;
    }

    #card {
        width: 120%;
    }

    .card-content h2 {
        margin-left: 100%;
    }
</style>

<body>

    <header class="header-home">
        <img class="bg" src="image/bg.jpg" alt="">
        <div class="overlay">
            <h1 style="font-size:5vw;">E-Libing</h1>
            <p style="font-size:2vw;"> We cater electronic burial services including appointments, bookings, cadaver
                locations, and many more. </p>
        </div>
    </header>

    <div class="container-home">
        <div class="offer-section">
            <aside class="card-side">
                <div class="card-panel" id="card-panel">
                    <div class="card" id="card">
                        <a href="#" id="myBtn">
                            <div class="image-wrapper">
                                <img src="image/burial.jpg" class="burial" alt="">
                            </div>
                            <div class="card-content">
                                <h2>Burials</h2>
                            </div>
                        </a>
                    </div>
                </div>
                <br>
                <div class="card-panel" id="card-panel">
                    <div class="card" id="card">
                        <a href="#" id="myBtn">
                            <div class="image-wrapper">
                                <img src="image/locator.jpg" class="locator" alt="">
                            </div>
                            <div class="card-content">
                                <h2>Locator</h2>
                            </div>
                        </a>
                    </div>
                </div>

            </aside>

            <section class="container-section">
                <h1 style="font-size:5vw;">WHAT WE OFFER</h1>
                <p style="font-size:1.9vw;">With E-Libing, we offer a comprehensive range of burial services tailored to
                    your
                    specific
                    needs and cultural traditions. Our experienced and caring staff are here to help you navigate the
                    funeral
                    planning
                    process, ensuring that every detail is handled with sensitivity and professionalism.</p>
                <p style="font-size:1.8vw;">Please feel free to explore our burial services further or contact us
                    directly
                    to
                    discuss
                    your specific needs. We are here for you every step of the way.</p>
            </section>

        </div>
    </div>

    <section class="teaser col-1-3  not">
        <img class="teaser-image" src="image/morgue.jpg" align="right" alt="">
        <h1 style="font-size:4vw;">Notification of the Exhumation of Cadavers</h1>
        <p style="font-size:2vw;">The notification is intended to inform relevant parties, such as family
            members, authorities, or interested parties, about the upcoming exhumation and any associated procedures or
            legal
            requirements.</p>
        <div class="container">
            <a href="cadavers.php" class="myButton">Learn More</a>
        </div>
    </section>

    <div class="master-profiles">
        <section class="teaser col-1-3">
            <img class="teaser-image" src="image/files.jpg" align="left" alt="">
            <h1 style="font-size:5vw;">Master Profiles</h1>
            <p style="font-size:2vw;">A Master Profile is the overall collection a user's profile data from every
                endpoint on which they regularly authenticate.</p>
            <div class="container">
                <a href="master.php" class="myButton">Learn More</a>
            </div>
        </section>
    </div>
</body>

</html>

<div id="myModal" class="modal">

    <div class="modal-content">
        <span class="close">&times;</span>
        <p>Please create an account</p>
        <br>
        <div class="footer">
            <button class="myBtn" onclick="openLogin()">OK</button>
        </div>
    </div>

</div>

<script>
    var modal = document.getElementById("myModal");

    var btn = document.getElementById("myBtn");

    var span = document.getElementsByClassName("close")[0];

    btn.onclick = function () {
        modal.style.display = "block";
    }

    span.onclick = function () {
        modal.style.display = "none";
    }

    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    function openLogin() {
        window.location.href = 'user-log.php'
    }
</script>

<style>
    .myBtn {
        width: 50px;
        height: 30px;
        background: blue;
        cursor: pointer;
        border-radius: 5px;
        border: none;
        color: white;
        font-weight: bold;
        transition: transform 0.3s;
    }

    .myBtn:hover {
        transform: scale(1.1);

    }

    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);
    }

    .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 30%;
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
</style>