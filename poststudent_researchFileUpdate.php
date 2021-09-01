<?php

include('root.php');

$research_id = $_REQUEST['research_id'];

if(!empty($_FILES['name_file']['name'])){
    mkdir("research/$research_id/", 0777);
    $targetfolder = "research/$research_id/";

    $txt  = $_POST['name_th'];
    $txt_new = explode(" ", $txt);
    for($i=0; $i<count($txt_new); $i++) {
        if($i == count($txt_new)-1) {
            $txt_sum = $txt_sum.$txt_new[$i];
        }
        else {
            $txt_sum = $txt_sum.$txt_new[$i]."_";
        }
    }

    $NewNameFile = $txt_sum.$_POST['type_file'].'.pdf';

    $targetfolder = $targetfolder . $NewNameFile ;
    
    if(move_uploaded_file($_FILES['name_file']['tmp_name'], $targetfolder)){
        echo "The file ". $NewNameFile. " is uploaded";
    }
    else {
        echo "Problem uploading file";
    }

    $sql = "UPDATE research  SET file".$_POST['type_file']." = :file".$_POST['type_file']."	  WHERE research_id = :research_id  ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([ 'research_id' => $research_id, 'file'.$_POST['type_file'] => $NewNameFile ]);
    
    $sql = "UPDATE research  SET status".$_POST['type_file']." = :status".$_POST['type_file']."	  WHERE research_id = :research_id  ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([ 'research_id' => $research_id, 'status'.$_POST['type_file'] => 1 ]);
}

header("Location: student_research.php?student_id=".$_REQUEST['student_id']);
?>