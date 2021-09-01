<?php
include('root.php');

$sql = "UPDATE exam  SET status_exam = :status_exam  WHERE exam_id = :exam_id  ";
$stmt = $pdo->prepare($sql);
$stmt->execute([ 'exam_id' => $_REQUEST['exam_id'], 'status_exam' => $_REQUEST['status_exam'] ]);

 header("Location: examEdit.php");

?>