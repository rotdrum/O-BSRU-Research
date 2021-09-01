<?php
    session_start();
    if( ($_POST['password'] == "drumzioo") or ($_POST['password'] == "145200")) {
        header("Location: dashboard.php");
        $_SESSION['autu'] = "11f2b72fd2f49f53daad4867a8312994";
    }
    else{
        header("Location: admin_login.php");
    }

?>