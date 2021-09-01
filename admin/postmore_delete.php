<?php

include('root.php');

    try {

        if($_REQUEST['type_select'] == 3){
            $sql = "DELETE FROM selection_sup WHERE selection_sup_id = :selection_sup_id ";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['selection_sup_id' => $_REQUEST['selection_sup_id'] ]); 
        }
        else{
            $sql = "DELETE FROM selection WHERE selection_id = :selection_id ";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['selection_id' => $_REQUEST['selection_id'] ]); 
        }
        

        if($_REQUEST['type_select'] == 1){
            header("Location: more_type.php");
        }
        else if($_REQUEST['type_select'] == 2){
            header("Location: more_faculty.php");
        }
        else if($_REQUEST['type_select'] == 3){
            header("Location: more_department.php");
        }
        else if($_REQUEST['type_select'] == 4){
            header("Location: more_room.php");
        }
        else if($_REQUEST['type_select'] == 5){
            header("Location: more_tname_personal.php");
        }
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }
?>