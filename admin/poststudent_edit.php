<?php

include('root.php');

try {
    if ($_POST['password'] != ""){
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
    
    $sql = "UPDATE student  SET student_card = :student_card  WHERE student_id = :student_id  ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([ 'student_id' => $_POST['student_id'], 'student_card' => $_POST['student_card'] ]);
    
    $sql = "UPDATE student  SET field = :field  WHERE student_id = :student_id  ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([ 'student_id' => $_POST['student_id'], 'field' => $_POST['field'] ]);
    
    $sql = "UPDATE student  SET faculty = :faculty  WHERE student_id = :student_id  ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([ 'student_id' => $_POST['student_id'], 'faculty' => $_POST['faculty'] ]);
    
    $sql = "UPDATE student  SET email = :email  WHERE student_id = :student_id  ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([ 'student_id' => $_POST['student_id'], 'email' => $_POST['email'] ]);
    
    $sql = "UPDATE student  SET tel = :tel  WHERE student_id = :student_id  ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([ 'student_id' => $_POST['student_id'], 'tel' => $_POST['tel'] ]);
    
    $sql = "UPDATE student  SET dateofbirth	 = :dateofbirth	  WHERE student_id = :student_id  ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([ 'student_id' => $_POST['student_id'], 'dateofbirth' => $_POST['dateofbirth'] ]);
    header("Location: student_manage.php");
    
}
catch(PDOException $e) {
    echo $e->getMessage();
}
?>