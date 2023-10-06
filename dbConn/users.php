<?php
include('conn.php');

$lname = $_POST['lname'];
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$address = $_POST['address'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$password = $_POST['password'];
$conpassword = $_POST['conpassword'];

if (!empty($lname) || !empty($fname) || !empty($mname) || !empty($address) || !empty($email) || !empty($contact) || !empty($password) || !empty($conpassword)) {
    // Check if password and confirm password match
    if ($password === $conpassword) { 
        $select = "SELECT email FROM users WHERE email = ? LIMIT 1";
        $insert = "INSERT INTO users (lastname, firstname, midname, address, email,  contactno, password, conpassword, role) VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'client')";
        $stmt = $conn->prepare($select);
       
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->store_result();
        $num = $stmt->num_rows;

        if ($num == 0) {
            $stmt->close();
            $stmt = $conn->prepare($insert);
            $stmt->bind_param("ssssssss", $lname, $fname, $mname, $address, $email, $contact, $password, $conpassword);
            $stmt->execute();

            echo "<script>if(confirm('Your Record Successfully Inserted. Now Login')){document.location.href='../user-log.php'};</script>";
        } else {
            echo '<script type="text/javascript"> alert("This Email: ' . $email . ' is already registered"); window.location.href = "../signin.php"; </script>';
        }
        $stmt->close();
        $conn->close();
    } else {
        echo '<script type="text/javascript"> alert("Password and Confirm Password do not match"); window.location.href = "../signin.php"; </script>';
    }
} else {
    echo "All fields are required";
    die();
}

?>