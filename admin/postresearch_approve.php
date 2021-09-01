<?php
include('root.php');

$sql = "UPDATE research  SET status".$_REQUEST['file']." = :status".$_REQUEST['file']."  WHERE research_id = :research_id  ";
$stmt = $pdo->prepare($sql);
$stmt->execute([ 'research_id' => $_REQUEST['research_id'], 'status'.$_REQUEST['file'] => 2 ]);

header("Location: research_approve.php");
?>