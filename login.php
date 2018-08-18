<?php
    session_start();
    
    $_SESSION['regId'] = $_POST['regId'];
    $_SESSION['userId'] = $_POST['userId'];
    $_SESSION['fullName'] = $_POST['fullName'];

    header("location: index.php");
?>