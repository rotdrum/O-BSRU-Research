<?php
include('root.php');

$sql = "UPDATE ".$_POST['autu']."  SET username = :username  WHERE ".$_POST['autu']."_id = :".$_POST['autu']."_id  ";
$stmt = $pdo->prepare($sql);
$stmt->execute([ $_POST['autu'].'_id' => $_POST[$_POST['autu'].'_id'] , 'username' => $_POST['username'] ]);

$sql = "UPDATE ".$_POST['autu']."  SET password = :password  WHERE ".$_POST['autu']."_id = :".$_POST['autu']."_id  ";
$stmt = $pdo->prepare($sql);
$stmt->execute([ $_POST['autu'].'_id' => $_POST[$_POST['autu'].'_id'] , 'password' => password_hash($_POST['password'], PASSWORD_DEFAULT) ]);


$sql = "UPDATE ".$_POST['autu']."  SET status = :status  WHERE ".$_POST['autu']."_id = :".$_POST['autu']."_id  ";
$stmt = $pdo->prepare($sql);
$stmt->execute([ $_POST['autu'].'_id' => $_POST[$_POST['autu'].'_id'] , 'status' => 1 ]);


header("Location: index.php?".$_POST['autu']."_id=".$_POST[$_POST['autu'].'_id']);


?>