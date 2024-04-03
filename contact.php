<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="css/contact.css">

<?php
include('component/header.php');
include('component/navbar.php');
?>

<body>
    <script src="path/to/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="path/to/sweetalert.css">

    <div class="contact-container">
        <div class="content">
            <div class="left-side">
                <div class="address details">
                    <i class="fas fa-map-marker-alt"></i>
                    <div class="topic">Address</div>
                    <div class="text-one">City Hall Drive,</div>
                    <div class="text-one">Barangay Dadiangas West,</div>
                    <div class="text-two">General Santos City</div>
                </div>
                <div class="phone details">
                    <i class="fas fa-phone-alt"></i>
                    <div class="topic">Phone</div>
                    <div class="text-one">+6391 1234 1234</div>
                    <div class="text-two">+6391 1234 1234</div>
                </div>
                <div class="email details">
                    <i class="fas fa-envelope"></i>
                    <div class="topic">Email</div>
                    <div class="text-one">GSCELibing@gensan.gov.ph</div>
                </div>
            </div>
            <div class="right-side">
                <div class="topic-text">Send us a message</div>
                <p>If you have any questions related toour services, you can send us a message from here. It's our
                    pleasure to
                    serve you.</p>
                <form action="submitemail.php" method="POST">
                    <div class="input-box">
                        <input type="text" name="name" placeholder="Enter your name">
                    </div>
                    <div class="input-box">
                        <input type="text" name="email" placeholder="Enter your email">
                    </div>
                    <div class="input-box message-box">
                        <input type="text" name="message" placeholder="Enter your Message">
                    </div>
                    <div class="contact-button">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<style>
    .btn.btn-primary {
    background-color: rgb(1, 57, 94); /* Blue background */
    color: #fff; /* White text */
    padding: 10px 15px; /* Padding */
    border: none; /* No border */
    border-radius: 5px; /* Rounded corners */
    cursor: pointer; /* Cursor style */
    font-size: 16px; /* Font size */
}

.btn.btn-primary:hover {
    background-color: #0056b3; /* Darker blue on hover */
}

.btn.btn-primary:focus {
    outline: none; /* Remove focus outline */
    box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.25); /* Add focus border */
}
</style>