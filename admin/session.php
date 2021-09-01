<?php
    session_start();
    if($_SESSION['autu'] != "11f2b72fd2f49f53daad4867a8312994") {
        header("location: ./admin_login.php");
    }
?>