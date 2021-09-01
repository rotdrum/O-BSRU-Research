<?php

include('root.php');

if($_POST['password'] != ''){
    $sql = "UPDATE student  SET password = :password  WHERE student_id = :student_id  ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([ 'student_id' => $_POST['student_id'], 'password' => password_hash($_POST['password'], PASSWORD_DEFAULT) ]);
}

$sql = "UPDATE student  SET username = :username  WHERE student_id = :student_id  ";
$stmt = $pdo->prepare($sql);
$stmt->execute([ 'student_id' => $_POST['student_id'], 'username' => $_POST['username'] ]);

$sql = "UPDATE student  SET tname = :tname  WHERE student_id = :student_id  ";
$stmt = $pdo->prepare($sql);
$stmt->execute([ 'student_id' => $_POST['student_id'], 'tname' => $_POST['tname'] ]);

$sql = "UPDATE student  SET fname = :fname  WHERE student_id = :student_id  ";
$stmt = $pdo->prepare($sql);
$stmt->execute([ 'student_id' => $_POST['student_id'], 'fname' => $_POST['fname'] ]);

$sql = "UPDATE student  SET lname = :lname  WHERE student_id = :student_id  ";
$stmt = $pdo->prepare($sql);
$stmt->execute([ 'student_id' => $_POST['student_id'], 'lname' => $_POST['lname'] ]);

$sql = "UPDATE student  SET email = :email  WHERE student_id = :student_id  ";
$stmt = $pdo->prepare($sql);
$stmt->execute([ 'student_id' => $_POST['student_id'], 'email' => $_POST['email'] ]);

$sql = "UPDATE student  SET tel = :tel  WHERE student_id = :student_id  ";
$stmt = $pdo->prepare($sql);
$stmt->execute([ 'student_id' => $_POST['student_id'], 'tel' => $_POST['tel'] ]);


header("Location: index.php?student_id=".$_POST['student_id']);
?>