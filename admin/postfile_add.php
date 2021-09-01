<?php

include('root.php');

$support_id = 0 ;

$stmt = $pdo->query("select * from file_support ");
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $support_id = $row['support_id'];
}

$support_id = $support_id + 1 ;

mkdir("../file_support/$support_id/", 0777);

$targetfolder = "../file_support/$support_id/";

$targetfolder = $targetfolder . basename( $_FILES['name_file']['name']) ;

if(move_uploaded_file($_FILES['name_file']['tmp_name'], $targetfolder)){
    echo "The file ". basename( $_FILES['name_file']['name']). " is uploaded";
}
else {
    echo "Problem uploading file";
}

$sql = 'INSERT INTO file_support (support_id, title, address_file, create_up) 
VALUES (:support_id, :title, :address_file, :create_up) ';
$stmt = $pdo->prepare($sql);
$stmt->execute([
            "support_id" => $support_id, 
            "title" =>  $_POST['title'], 
            "address_file" =>  basename( $_FILES['name_file']['name']) , 
            "create_up" =>  $_POST['create_up'], 
]);

header("Location: file_manage.php");
?>