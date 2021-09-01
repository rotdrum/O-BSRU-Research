<?php
include('root.php');

$flag = 0 ;
$autu = "" ;


$stmt = $pdo->query("select * from student WHERE username = '".$_POST['username']."' ");
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){ 
    if($flag == 0) {
        if(password_verify($_POST['password'], $row['password'])) {
            $autu = "student_id" ;
            $student_id = $row['student_id'] ;
            $status = $row['status'];
            $flag = 1 ;
        }
    }
}; 

if($flag == 0){
    $stmt = $pdo->query("select * from personal WHERE username = '".$_POST['username']."' ");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){ 
        if($flag == 0) {
            if(password_verify($_POST['password'], $row['password'])) {
                $autu = "personal_id" ;
                $student_id = $row['personal_id'] ;
                $status = $row['status'];
                $flag = 1 ;
            }
        }
    }; 
}

if($autu == ""){
    header("Location: loginAlert.php");
}
else{
    if($status == 9){
        header("Location: chagepassword.php?".$autu."=".$student_id);
    }
    else if($status == 1){
        header("Location: index.php?".$autu."=".$student_id);
    }
}

/*
$stmt = $pdo->query("select * from personal WHERE username = '".$_POST['username']."' ");
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){ 
    if(password_verify($_POST['password'], $row['password'])) {
        if($row['status'] == 9){
            header("Location: chagepassword.php?personal_id=".$row['personal_id']);
        }
        else if($row['status'] == 1){
            header("Location: index.php?personal_id=".$row['personal_id']);
        }
    }
}; 
*/

// header("Location: login.php");

?>