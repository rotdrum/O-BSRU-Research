<?php

include('root.php');

$news_id = 0 ;

$stmt = $pdo->query("select * from news ");
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $news_id = $row['news_id'];
}

$news_id = $news_id + 1 ;

mkdir("../news/$news_id/", 0777);

$targetfolder = "../news/$news_id/";

$targetfolder = $targetfolder . basename( $_FILES['name_file']['name']) ;

if(move_uploaded_file($_FILES['name_file']['tmp_name'], $targetfolder)){
    echo "The file ". basename( $_FILES['name_file']['name']). " is uploaded";
}
else {
    echo "Problem uploading file";
}

$sql = 'INSERT INTO news (news_id, title, comment, pic_file, create_up) 
VALUES (:news_id, :title, :comment, :pic_file, :create_up) ';
$stmt = $pdo->prepare($sql);
$stmt->execute([
            "news_id" => $news_id, 
            "title" =>  $_POST['title'], 
            "comment" =>  $_POST['comment'], 
            "pic_file" =>  basename( $_FILES['name_file']['name']) , 
            "create_up" =>  $_POST['create_up'], 
]);

 header("Location: news_manage.php");
?>