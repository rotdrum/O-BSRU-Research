<?php

include('root.php');

$support_id = $_POST['support_id'] ;

if(empty($_FILES['name_file']['name'])){ 
    $sql = "UPDATE file_support  SET title = :title  WHERE support_id = :support_id  ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([ 'support_id' => $_POST['support_id'], 'title' => $_POST['title'] ]);
}
else{
    $targetfolder = "../file_support/$support_id/";

    $targetfolder = $targetfolder . basename( $_FILES['name_file']['name']) ;
    
    if(move_uploaded_file($_FILES['name_file']['tmp_name'], $targetfolder)){
        echo "The file ". basename( $_FILES['name_file']['name']). " is uploaded";
    }
    else {
        echo "Problem uploading file";
    }

    $sql = "UPDATE file_support  SET title = :title  WHERE support_id = :support_id  ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([ 'support_id' => $_POST['support_id'], 'title' => $_POST['title'] ]);

    $sql = "UPDATE file_support  SET address_file = :address_file  WHERE support_id = :support_id  ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([ 'support_id' => $_POST['support_id'], 'address_file' => basename( $_FILES['name_file']['name']) ]);
}


 header("Location: file_manage.php");
?>