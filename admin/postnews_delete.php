<?php

include('root.php');

$news_id = $_REQUEST['news_id'] ;


array_map('unlink', glob("../news/$news_id/*.*"));
rmdir("../news/$news_id/");

    $sql = "DELETE FROM news WHERE news_id = :news_id ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['news_id' => $_REQUEST['news_id'] ]); 

header("Location: news_manage.php");
?>