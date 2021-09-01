<?php
include('root.php');


$stmt = $pdo->query("select * from student where student_id = ".$_REQUEST['student_id']." ");
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $research_id = $row['research_id'];
}

array_map('unlink', glob("research/$research_id/*.*"));
rmdir("research/$research_id/");

$sql = "DELETE FROM research WHERE research_id = :research_id ";
$stmt = $pdo->prepare($sql);
$stmt->execute(['research_id' => $research_id ]); 

$sql = "DELETE FROM exam WHERE research_id = :research_id ";
$stmt = $pdo->prepare($sql);
$stmt->execute(['research_id' => $research_id ]); 

$sql = "UPDATE student  SET research_id = :research_id  WHERE student_id = :student_id  ";
$stmt = $pdo->prepare($sql);
$stmt->execute([ 'student_id' => $_REQUEST['student_id'], 'research_id' => 0 ]);

header("Location: student_research.php?student_id=".$_REQUEST['student_id']);
?>