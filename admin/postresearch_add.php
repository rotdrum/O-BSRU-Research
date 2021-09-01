<?php

include('root.php');

    try {

        $research_id = 0 ;

        $stmt = $pdo->query("select * from research ");
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $research_id = $row['research_id'];
        }

        $research_id = $research_id + 1 ;

        mkdir("../research/$research_id/", 0777);

        $targetfolder = "../research/$research_id/";

        $targetfolder = $targetfolder . basename( $_FILES['name_file']['name']) ;

        if(move_uploaded_file($_FILES['name_file']['tmp_name'], $targetfolder)){
            echo "The file ". basename( $_FILES['name_file']['name']). " is uploaded";
        }
        else {
            echo "Problem uploading file";
        }
        echo "<br>".$_POST['update_up'];
        $sql = 'INSERT INTO research (research_id, name_th, name_eng, look, types, term, year, personal_main, personal_sup, student_one, student_two, abstract, file1, file2, file3, file4, status1, status2, status3, status4, create_up, update_up) 
        VALUES (:research_id, :name_th, :name_eng, :look , :types , :term , :year , :personal_main , :personal_sup , :student_one , :student_two , :abstract , :file1 , :file2 , :file3 , :file4 , :status1 , :status2 , :status3 , :status4 , :create_up, :update_up) ';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
                    "research_id" => $research_id, 
                    "name_th" =>  $_POST['name_th'], 
                    "name_eng" =>  $_POST['name_eng'], 
                    "look" =>  NULL, 
                    "types" =>  $_POST['types'], 
                    "term" =>  $_POST['term'], 
                    "year" =>  $_POST['year'], 
                    "personal_main" =>  $_POST['personal_main'], 
                    "personal_sup" =>  $_POST['personal_sup'], 
                    "student_one" =>  $_POST['student_one'], 
                    "student_two" =>  $_POST['student_two'], 
                    "abstract" =>  $_POST['abstract'], 
                    "file1" =>  NULL , 
                    "file2" =>  NULL, 
                    "file3" =>  NULL, 
                    "file4" =>  basename( $_FILES['name_file']['name'] ), 
                    "status1" =>  0, 
                    "status2" =>  0, 
                    "status3" =>  0, 
                    "status4" =>  2, 
                    "create_up" =>  $_POST['create_up'], 
                    "update_up" =>  $_POST['update_up']
        ]);

        try {

            $sql = "INSERT INTO exam (research_id, room, ex_date1, ex_time1, ex_date2, ex_time2 , ex_status, teacher1, teacher2, teacher3, teacher_id, update_time) 
            VALUES (:research_id, :room, :ex_date1, :ex_time1, :ex_date2, :ex_time2, :ex_status, :teacher1, :teacher2, :teacher3, :teacher_id, :update_time) ";
            $stmt = $pdo->prepare($sql);
            echo "Here3";
            $stmt->execute([
            "research_id" => $research_id,
            "room" => null,
            "ex_date1" => null,
            "ex_time1" => null,
            "ex_date2" => null,
            "ex_time2" => null,
            "ex_status" => "9",
            "teacher1" => null,
            "teacher2" => null,
            "teacher3" => null,
            "teacher_id" => $_POST['personal_main'],
            "update_time" => null
            ]);

            echo "Here3";


            header("location: research_search.php");
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }







?>