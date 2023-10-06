<!DOCTYPE html>
<html lang="en">

<link rel="stylesheet" href="css/usersignin.css">

<?php
require('component/header.php');
require('component/navbar.php');
?>

<body>
    <br><br><br><br><br>
    <div class="home">
        <div class="content">
            <br>
            <!-- <img src="image/lgu_logo.png" alt="logo" class="logo" id="logo"> -->
            <h2>Welcome</h2>
            <h3>to e-Libing</h3>
        </div>
        <div class="container-login">
            <form action="dbConn/users.php" method="POST" enctype="multipart/form-data">
                <h2>Sign In</h2>
                <div class="group">
                    <div class="form-group-login">

                        <div class="row">
                            <div class="col">
                                <label for="lname">Last name</label>
                                <input type="text" name="lname" class="form-control-login" required>
                            </div>
                            <div class="col">
                                <label for="fname">First name</label>
                                <input type="text" name="fname" class="form-control-login" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="mname">Middle name</label>
                                <input type="text" name="mname" class="form-control-login" required>
                            </div>

                            <div class="col">
                                <label for="address">Address</label>
                                <input type="text" name="address" class="form-control-login" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control-login" required>
                            </div>

                            <div class="col">
                                <label for="contact">Contact No.</label>
                                <input type="text" name="contact" class="form-control-login" required>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control-login" required>
                            </div>

                            <div class="col">
                                <label for="conpassword">Confirm Password</label>
                                <input type="password" name="conpassword" class="form-control-login" required>
                            </div>

                        </div>

                        <button class="custom-button" name="userlogin">Register</button>
                        <h4 class="sign">You already have an account? <span><a href="user-log.php">Login</a></span></h4>
                    </div>
                </div>

            </form>
        </div>
    </div>

</body>

</html>