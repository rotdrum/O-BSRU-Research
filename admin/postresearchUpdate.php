<?php

include('root.php');

$research_id = $_REQUEST['research_id'];

$sql = "UPDATE research  SET name_th = :name_th	 WHERE research_id = :research_id  ";
$stmt = $pdo->prepare($sql);
$stmt->execute([ 'research_id' => $research_id, 'name_th' => $_POST['name_th'] ]);

$sql = "UPDATE research  SET name_eng = :name_eng  WHERE research_id = :research_id  ";
$stmt = $pdo->prepare($sql);
$stmt->execute([ 'research_id' => $research_id, 'name_eng' => $_POST['name_eng']  ]);

$sql = "UPDATE research  SET look = :look	  WHERE research_id = :research_id  ";
$stmt = $pdo->prepare($sql);
$stmt->execute([ 'research_id' => $research_id, 'look' => NULL  ]);

$sql = "UPDATE research  SET types = :types	  WHERE research_id = :research_id  ";
$stmt = $pdo->prepare($sql);
$stmt->execute([ 'research_id' => $research_id, 'types' => $_POST['types']  ]);

$sql = "UPDATE research  SET term = :term	  WHERE research_id = :research_id  ";
$stmt = $pdo->prepare($sql);
$stmt->execute([ 'research_id' => $research_id, 'term' => $_POST['term']  ]);

$sql = "UPDATE research  SET year = :year	  WHERE research_id = :research_id  ";
$stmt = $pdo->prepare($sql);
$stmt->execute([ 'research_id' => $research_id, 'year' => $_POST['year']  ]);

$sql = "UPDATE research  SET personal_main = :personal_main	  WHERE research_id = :research_id  ";
$stmt = $pdo->prepare($sql);
$stmt->execute([ 'research_id' => $research_id, 'personal_main' => $_POST['personal_main']  ]);

$sql = "UPDATE research  SET personal_sup = :personal_sup	  WHERE research_id = :research_id  ";
$stmt = $pdo->prepare($sql);
$stmt->execute([ 'research_id' => $research_id, 'personal_sup' => $_POST['personal_sup']  ]);

$sql = "UPDATE research  SET student_one = :student_one	  WHERE research_id = :research_id  ";
$stmt = $pdo->prepare($sql);
$stmt->execute([ 'research_id' => $research_id, 'student_one' => $_POST['student_one']  ]);

$sql = "UPDATE research  SET student_two = :student_two	  WHERE research_id = :research_id  ";
$stmt = $pdo->prepare($sql);
$stmt->execute([ 'research_id' => $research_id, 'student_two' => $_POST['student_two']  ]);

$sql = "UPDATE research  SET abstract = :abstract	  WHERE research_id = :research_id  ";
$stmt = $pdo->prepare($sql);
$stmt->execute([ 'research_id' => $research_id, 'abstract' => $_POST['abstract']  ]);

$sql = "UPDATE research  SET update_up = :update_up	  WHERE research_id = :research_id  ";
$stmt = $pdo->prepare($sql);
$stmt->execute([ 'research_id' => $research_id, 'update_up' => $_POST['update_up']  ]);

header("Location: research_approve.php");
?>