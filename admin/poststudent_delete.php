<?php

include('root.php');

$research_id = 0 ;

$stmt = $pdo->query("select * from student where student_id = ".$_REQUEST['student_id']." ");
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $research_id = $row['research_id'] ;
}

if($research_id == 0){
    $sql = "DELETE FROM student WHERE student_id = :student_id ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['student_id' => $_REQUEST['student_id'] ]); 
    $_SESSION['student_delete'] = 5 ;
    header("Location: student_manage.php");
}
else{
    $_SESSION['student_delete'] = 9 ;
    header("Location: student_manage.php");
}

?>