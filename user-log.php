<!DOCTYPE html>
<html lang="en">

<link rel="stylesheet" href="css/userlog.css">

<?php
require('component/header.php');
require('component/navbar.php');
?>

<body>
    <div class="home">
        <div class="content">
            <br>
            <!-- <img src="image/lgu_logo.png" alt="logo" class="logo" id="logo"> -->
  
        </div>
        <div class="container-login">
            <form action="dbConn/valLogin.php" method="GET">
                <h2>Login</h2>
                <div class="group">

                    <div class="form-group-login">
                        <label for="username">Email</label>
                        <input type="email" name="email" class="form-control-login">

                    </div>
                    <div class="form-group-login">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control-login">
                    </div>
                </div>

                <button class="custom-button">Login</button>
                <h4 class="sign">Don't have an account yet? <span><a href="signin.php">Sign In</a></span></h4>
            </form>

        </div>
    </div>

</body>

</html>