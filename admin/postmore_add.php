<?php

include('root.php');

if($_POST['type_select'] == 3){
    $selection_sup_id = 0 ;

    $stmt = $pdo->query("select * from selection_sup ");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $selection_sup_id = $row['selection_sup_id'];
    }
    
    $selection_sup_id = $selection_sup_id + 1 ;
    
    $sql = 'INSERT INTO selection_sup (selection_sup_id, selection_id, data_select, create_up) 
    VALUES (:selection_sup_id, :selection_id, :data_select, :create_up) ';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
                "selection_sup_id" => $selection_sup_id, 
                "selection_id" =>  $_POST['selection_id'], 
                "data_select" =>  $_POST['data_select'], 
                "create_up" =>  $_POST['create_up'], 
    ]);
}
else{
    $selection_id = 0 ;

    $stmt = $pdo->query("select * from selection ");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $selection_id = $row['selection_id'];
    }
    
    $selection_id = $selection_id + 1 ;
    
    $sql = 'INSERT INTO selection (selection_id, data_select, type_select, create_up) 
    VALUES (:selection_id, :data_select, :type_select, :create_up) ';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
                "selection_id" => $selection_id, 
                "data_select" =>  $_POST['data_select'], 
                "type_select" =>  $_POST['type_select'], 
                "create_up" =>  $_POST['create_up'], 
    ]);
}

if($_POST['type_select'] == 1){
    header("Location: more_type.php");
}
else if($_POST['type_select'] == 2){
    header("Location: more_faculty.php");
}
else if($_POST['type_select'] == 3){
    header("Location: more_department.php");
}
else if($_POST['type_select'] == 4){
    header("Location: more_room.php");
}
else if($_POST['type_select'] == 5){
    header("Location: more_tname_personal.php");
}

?>