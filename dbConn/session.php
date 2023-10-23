
<?php
    if(!isset($_SESSION['id'])){
        header("Location: index.php");
    } else {
        $id = $_SESSION['id'];
        $name = $_SESSION['Createdby'];
        $restriction = $_SESSION['restriction'];
    }
?>