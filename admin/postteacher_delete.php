<?php

include('root.php');

$personal_id = $_REQUEST['personal_id'] ;

    $flag = 0 ;
    $stmt = $pdo->query("select * from research where personal_main = ".$_REQUEST['personal_id']." ");
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $flag = 1 ;
    }

    if($flag == 0){
        $sql = "DELETE FROM personal WHERE personal_id = :personal_id ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['personal_id' => $_REQUEST['personal_id'] ]); 
        $_SESSION['teacher_delete'] = 5 ;
        header("Location: teacher_manage.php");
    }
    else{
        $_SESSION['teacher_delete'] = 9 ;
        header("Location: teacher_manage.php");
    }
?>