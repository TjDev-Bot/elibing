
<?php
    if(!isset($_SESSION['id'])){
        header("Location: index.php");
    } else {
        $id = $_SESSION['id'];
        $lname = $_SESSION['lname'];
        $fname = $_SESSION['fname'];
        $midname = $_SESSION['midname'];
        $role = $_SESSION['role'];
    }
?>