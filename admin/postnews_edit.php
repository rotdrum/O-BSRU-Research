<?php
include('root.php');

$news_id = $_POST['news_id'];

if(!empty($_FILES['name_file']['name'])){
    mkdir("../news/$news_id/", 0777);

    $targetfolder = "../news/$news_id/";

    echo $targetfolder;

    $targetfolder = $targetfolder . basename( $_FILES['name_file']['name']) ;

    if(move_uploaded_file($_FILES['name_file']['tmp_name'], $targetfolder)){
        echo "The file ". basename( $_FILES['name_file']['name']). " is uploaded";
    }
    else {
        echo "Problem uploading file";
    }
    $sql = "UPDATE news  SET pic_file = :pic_file  WHERE news_id = :news_id  ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([ 'news_id' => $_POST['news_id'], 'pic_file' => basename( $_FILES['name_file']['name']) ]);
}

$sql = "UPDATE news  SET title = :title  WHERE news_id = :news_id  ";
$stmt = $pdo->prepare($sql);
$stmt->execute([ 'news_id' => $_POST['news_id'], 'title' => $_POST['title'] ]);

$sql = "UPDATE news  SET comment = :comment  WHERE news_id = :news_id  ";
$stmt = $pdo->prepare($sql);
$stmt->execute([ 'news_id' => $_POST['news_id'], 'comment' => $_POST['comment'] ]);

header("Location: news_manage.php");

?>