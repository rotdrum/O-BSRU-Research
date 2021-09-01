<?php

include('root.php');
    try {

        $student_id = 0 ;

        $stmt = $pdo->query("select * from student ");
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $student_id = $row['student_id'];
        }

        $student_id = $student_id + 1 ;

        $sql = 'INSERT INTO student (student_id, tname, fname, lname, class, field, faculty, email, tel, student_card, username, password, status, dateofbirth, research_id, create_up) 
        VALUES (:student_id, :tname, :fname, :lname, :class, :field, :faculty, :email,  :tel, :student_card, :username, :password, :status, :dateofbirth, :research_id, :create_up) ';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
                    "student_id" => $student_id, 
                    "tname" =>  $_POST['tname'], 
                    "fname" =>  $_POST['fname'], 
                    "lname" =>  $_POST['lname'], 
                    "class" => null, 
                    "field" =>  $_POST['field'], 
                    "faculty" =>  $_POST['faculty'], 
                    "email" =>  $_POST['email'], 
                    "tel" =>  $_POST['tel'], 
                    "student_card" =>  $_POST['student_card'], 
                    "username" =>  $_POST['username'], 
                    "password" => password_hash($_POST['password'], PASSWORD_DEFAULT), 
                    "dateofbirth" =>  $_POST['dateofbirth'], 
                    "status" =>  9, 
                    "research_id" => 0, 
                    "create_up" =>  $_POST['create_up'], 
        ]);
        header("Location: student_manage.php");
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }

?>