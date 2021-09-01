<?php
        if($_REQUEST['student_id'] != $_SESSION['login_autu'] ) {
            header('location: index.php');
        }
        else if($_SESSION['login_status'] != "student"){
            header('location: index.php');
        }
?>