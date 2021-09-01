<?php

include('root.php');

$personal_id = 0 ;

$stmt = $pdo->query("select * from personal ");
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $personal_id = $row['personal_id'];
}

$personal_id = $personal_id + 1 ;

$sql = 'INSERT INTO personal (personal_id, tname, fname, lname, email, tel, username, password,  dateofbirth, status, create_up) 
VALUES (:personal_id, :tname, :fname, :lname, :email,  :tel, :username, :password, :dateofbirth, :status, :create_up) ';
$stmt = $pdo->prepare($sql);
$stmt->execute([
            "personal_id" => $personal_id, 
            "tname" =>  $_POST['tname'], 
            "fname" =>  $_POST['fname'], 
            "lname" =>  $_POST['lname'], 
            "email" =>  $_POST['email'], 
            "tel" =>  $_POST['tel'], 
            "username" =>  $_POST['username'], 
            "password" => password_hash($_POST['password'], PASSWORD_DEFAULT), 
            "dateofbirth" =>  $_POST['dateofbirth'], 
            "status" =>  9, 
            "create_up" =>  $_POST['create_up'], 
]);
 header("Location: teacher_manage.php");

?>