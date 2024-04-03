<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="css/home.css">

<?php
require('component/header.php');
require('component/navbar.php');
?>

<style>
    .container-section {
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .card-side {
        display: flex;
        flex-direction: column;
        align-items: center;
        position: relative;
        margin-top: 20px; /* Adjust as needed */
    }

    .card-panel {
        width: 100%; /* Make the card panel take full width */
        margin-bottom: 30px;
        margin-right: 20px;
        margin-leftt: 100px;
    }

    .card {
        width: 100%;
        background: #f0f0f0;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        animation: fadeInUp 2s linear both;
    }

    .card:hover {
  background-color: #E0E0E0;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
  transform: translateY(-2px);
}

    .card-content {
        margin-top: 0px;
    }

    #card img {
        max-width: 100%;
 
    }

    @media (min-width: 768px) {
        .card-side {
            width: 50%; /* Two cards per row on larger screens */
        }
    }

    @media (min-width: 992px) {
        .card-side {
            width: 30%; /* Three cards per row on even larger screens */
        }
    }

    @media (min-width: 300px) {
        .card-side {
            width: 40%; /* Three cards per row on even larger screens */
        }
    }
</style>

<body>

    <header class="header-home">
        <img class="bg" src="image/bg.jpg" alt="">

    </header>

    <div class="offer-section">
    <section class="container-section">
        <div class="container-home">
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
                    </div>

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

            <div class="card-panel" id="card-panel">
                <div class="card" id="card">
                    <a href="e-locator/index.php" id="myBtn">
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
        
    </section>
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