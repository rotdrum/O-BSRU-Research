<?php

include('root.php');

$exam_id = 0 ;

$stmt = $pdo->query("select * from exam ");
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $exam_id = $row['exam_id'];
}

$exam_id = $exam_id + 1 ;

$sql = 'INSERT INTO exam (exam_id, personal1, personal2, personal3,  dateofexam, class, status_exam,  status_file, research_id, create_up) 
VALUES (:exam_id, :personal1, :personal2, :personal3,  :dateofexam, :class, :status_exam, :status_file, :research_id,  :create_up) ';
$stmt = $pdo->prepare($sql);
$stmt->execute([
            "exam_id" => $exam_id, 
            "personal1" =>  $_POST['personal1'], 
            "personal2" =>  $_POST['personal2'], 
            "personal3" =>  $_POST['personal3'], 
            "dateofexam" =>  $_POST['date_exam']." ,".$_POST['time_exam'], 
            "class" =>  $_POST['class'], 
            "status_exam" =>  0, 
            "status_file" =>  $_POST['status_file'], 
            "research_id" =>  $_POST['research_id'], 
            "create_up" =>  $_POST['create_up'], 
]);

header("Location: exam.php");
?>