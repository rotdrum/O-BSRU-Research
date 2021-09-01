<?php

include('root.php');

if($_POST['type_select'] == 3){
    $sql = "UPDATE selection_sup  SET data_select = :data_select  WHERE selection_sup_id = :selection_sup_id  ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([ 'selection_sup_id' => $_POST['selection_sup_id'], 'data_select' => $_POST['data_select'] ]);
}
else{
    $sql = "UPDATE selection  SET data_select = :data_select  WHERE selection_id = :selection_id  ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([ 'selection_id' => $_POST['selection_id'], 'data_select' => $_POST['data_select'] ]);
}

$sql = "UPDATE selection  SET data_select = :data_select  WHERE selection_id = :selection_id  ";
$stmt = $pdo->prepare($sql);
$stmt->execute([ 'selection_id' => $_POST['selection_id'], 'data_select' => $_POST['data_select'] ]);

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