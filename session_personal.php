<?php
    if($_REQUEST['personal_id'] != $_SESSION['login_autu'] ) {
        header('location: index.php');
    }
    else if($_SESSION['login_status'] != "personal"){
        header('location: index.php');
    }
?>