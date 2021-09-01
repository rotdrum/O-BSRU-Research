<?php

include('root.php');


if ($_POST['password'] != ""){
    $sql = "UPDATE personal  SET password = :password  WHERE personal_id = :personal_id  ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([ 'personal_id' => $_POST['personal_id'], 'password' => password_hash($_POST['password'], PASSWORD_DEFAULT) ]);
}


$sql = "UPDATE personal  SET username = :username  WHERE personal_id = :personal_id  ";
$stmt = $pdo->prepare($sql);
$stmt->execute([ 'personal_id' => $_POST['personal_id'], 'username' => $_POST['username'] ]);

$sql = "UPDATE personal  SET tname = :tname  WHERE personal_id = :personal_id  ";
$stmt = $pdo->prepare($sql);
$stmt->execute([ 'personal_id' => $_POST['personal_id'], 'tname' => $_POST['tname'] ]);

$sql = "UPDATE personal  SET fname = :fname  WHERE personal_id = :personal_id  ";
$stmt = $pdo->prepare($sql);
$stmt->execute([ 'personal_id' => $_POST['personal_id'], 'fname' => $_POST['fname'] ]);

$sql = "UPDATE personal  SET lname = :lname  WHERE personal_id = :personal_id  ";
$stmt = $pdo->prepare($sql);
$stmt->execute([ 'personal_id' => $_POST['personal_id'], 'lname' => $_POST['lname'] ]);

$sql = "UPDATE personal  SET email = :email  WHERE personal_id = :personal_id  ";
$stmt = $pdo->prepare($sql);
$stmt->execute([ 'personal_id' => $_POST['personal_id'], 'email' => $_POST['email'] ]);

$sql = "UPDATE personal  SET tel = :tel  WHERE personal_id = :personal_id  ";
$stmt = $pdo->prepare($sql);
$stmt->execute([ 'personal_id' => $_POST['personal_id'], 'tel' => $_POST['tel'] ]);

$sql = "UPDATE personal  SET dateofbirth = :dateofbirth	  WHERE personal_id = :personal_id  ";
$stmt = $pdo->prepare($sql);
$stmt->execute([ 'personal_id' => $_POST['personal_id'], 'dateofbirth' => $_POST['dateofbirth'] ]);


header("Location: teacher_manage.php");
?>