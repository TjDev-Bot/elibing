
<?php
    if(!isset($_SESSION['id'])){
        header("Location: index.php");
    } else {
        $id = $_SESSION['id'];
        $email = $_SESSION['email1'];
        $name = $_SESSION['Createdby'];
        $restriction = $_SESSION['restriction'];
    }
?>