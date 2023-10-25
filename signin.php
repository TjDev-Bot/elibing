<!DOCTYPE html>
<html lang="en">

<link rel="stylesheet" href="css/usersignin.css">

<?php
require('component/header.php');
require('component/navbar.php');
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
/* Styles for the modal */
.modal-container {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    justify-content: center;
    align-items: center;
}

.modal-content {
    background: #fff;
    padding: 20px;
    border-radius: 5px;
    max-width: 80%;
    /* Adjust the maximum width */
    overflow-y: auto;
    /* Enable horizontal scrolling */
}

/* Style for the link */
.modal-link {
    text-decoration: none;
    color: blue;
    cursor: pointer;
}

/* Style for the bullet points */
.modal-content ul {
    list-style-type: disc;
    margin-left: 20px;
}

/* Additional styles for the <p> elements in the modal content */
.modal-content p {
    margin-bottom: 15px;
    line-height: 1.3;
    color: #333;
    font-size: 15px;
}

.modal-content li {
    margin-left: 25px;
    color: #333;
    font-size: 14px;
}

/* Style for the close button */
.modal-content button {
    background-color: red;
    color: white;
    border: none;
    padding: 10px 15px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    float: right;
}

/* Hover effect for the close button */
.modal-content button:hover {
    background-color: white;
}

/* Style for the modal header */
.modal-content h2 {
    font-size: 30px;
    color: black;
    margin-bottom: 20px;
}

/* Style for the link container */
.link-container {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 20px;
}
</style>


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
                <h2>Sign Up</h2>
                <div class="group">
                    <div class="form-group-login">

                        <div class="row">
                            <div class="col">
                                <label for="">Full Name</label>
                                <input type="text" name="name" class="form-control-login" required>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control-login" required>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control-login" required>
                            </div>

                         

                        </div>

                        <button class="custom-button" name="userlogin">Sign in</button>
                        <h4 class="sign">Already have an account? <span><a href="user-log.php">Login</a></span></h4>
                        <div class="link-container">
                            <!-- Modal Link -->
                            <div class="modal-link" onclick="toggleModal()">Terms and Conditions</div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>

</body>
<!-- The Modal -->
<div class="modal-container" id="modalContainer">
    <div class="modal-content">

        <!-- Modal Header -->
        <h2>Terms and Conditions</h2>

        <!-- Modal Body -->
        <h3>1. Acceptance of terms</h3>
        <p>By using this website, you accept these terms and conditions of use, all relevant laws and regulations, and
            the responsibility for adhering to any local laws that may be in force in your area. You are not permitted
            to use or access this website if you disagree with each of these terms.</p>

        <h3>2. Disclaimer</h3>
        <p>The information on the e-Libing website is given "as is." LGU makes no guarantees, expressed or implied, and
            expressly disclaims and negates all other warranties, including, without limitation, implied warranties or
            conditions of merchantability, fitness for a particular purpose, or non-infringement of intellectual
            property or other violations of rights.</p>

        <h3>3. Links</h3>
        <p>The Local Government Office is not liable for the content of any website that is linked to its website since
            it has not examined all of the sites that link to it. Any link on this page does not mean that the LGU
            approves of the website. The user accesses these linked websites at their own risk.</p>

        <h3>4. Contact of Information</h3>
        <p>Please email us at lgugensan@gmail.com if you have any questions or queries regarding our terms and
            conditions.</p>

        <h3>5. Use License</h3>
        <p>The e-Libing website's materials, information, or software may be downloaded just for your personal,
            noncommercial transitory reading. This entails a license grant, not a title transfer, and the following are
            prohibited under this license:</p>
        <ul>
            <li>modify or copy the materials;</li>
            <li>use the materials for any commercial purpose, or for any public display (commercial or non-commercial);
            </li>
            <li>attempt to decompile or reverse engineer any software contained on [Your Website Name]'s website;</li>
            <li>remove any copyright or other proprietary notations from the materials; or</li>
            <li>transfer the materials to another person or 'mirror' the materials on any other server.</li>
        </ul>

        <!-- Modal Footer -->
        <button onclick="toggleModal()">Close</button>
    </div>
</div>

<script>
function toggleModal() {
    var modal = document.getElementById('modalContainer');
    modal.style.display = modal.style.display === 'flex' ? 'none' : 'flex';
}
</script>

</html>