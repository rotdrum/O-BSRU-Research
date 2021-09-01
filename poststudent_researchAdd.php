<?php

include('root.php');

    try {

        $research_id = 0 ;

        $stmt = $pdo->query("select * from research ");
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $research_id = $row['research_id'];
        }

        $research_id = $research_id + 1 ;
        

        mkdir("research/$research_id/", 0777);

        $targetfolder = "research/$research_id/";

        $txt  = $_POST['name_th'];
        $txt_new = explode(" ", $txt);
        for($i=0; $i<count($txt_new); $i++) {
            if($i == count($txt_new)-1) {
                $txt_sum = $txt_sum.$txt_new[$i];
            }
            else {
                $txt_sum = $txt_sum.$txt_new[$i]."_";
            }
            
        }
        echo $txt_sum;

        $NewNameFile = $txt_sum.'1.pdf';

        $targetfolder = $targetfolder . $NewNameFile ;

        if(move_uploaded_file($_FILES['name_file']['tmp_name'], $targetfolder)){
            echo "The file ". $NewNameFile. " is uploaded";
        }
        else {
            echo "Problem uploading file";
        }

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
                    "file1" =>  $NewNameFile , 
                    "file2" =>  NULL, 
                    "file3" =>  NULL, 
                    "file4" =>  NULL, 
                    "status1" =>  1, 
                    "status2" =>  0, 
                    "status3" =>  0, 
                    "status4" =>  0, 
                    "create_up" =>  $_POST['create_up'], 
                    "update_up" =>  $_POST['update_up'], 
        ]);

        $sql = "INSERT INTO exam (research_id, room, ex_date1, ex_time1, ex_date2, ex_time2, ex_status, teacher1, teacher2, teacher3, teacher_id, update_time) 
                VALUES (:research_id, :room, :ex_date1, :ex_time1,  :ex_date2, :ex_time2, :ex_status, :teacher1, :teacher2, :teacher3, :teacher_id, :update_time) ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            "research_id" => $research_id,
            "room" => null,
            "ex_date1" => null,
            "ex_time1" => null,
            "ex_date2" => null,
            "ex_time2" => null,
            "ex_status" => "0",
            "teacher1" => null,
            "teacher2" => null,
            "teacher3" => null,
            "teacher_id" => $_POST['personal_main'],
            "update_time" => null
        ]);

        $sql = "UPDATE student  SET research_id = :research_id	  WHERE student_id = :student_id  ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([ 'student_id' => $_REQUEST['student_id'], 'research_id' => $research_id ]);
        echo "System done!";

    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }
header("Location: student_research.php?student_id=".$_REQUEST['student_id']);
?>