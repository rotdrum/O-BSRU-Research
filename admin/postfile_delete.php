<?php

include('root.php');

$support_id = $_REQUEST['support_id'] ;


array_map('unlink', glob("../file_support/$support_id/*.*"));
rmdir("../file_support/$support_id/");

    $sql = "DELETE FROM file_support WHERE support_id = :support_id ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['support_id' => $_REQUEST['support_id'] ]); 

header("Location: file_manage.php");
?>