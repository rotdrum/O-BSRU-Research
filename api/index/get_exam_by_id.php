<?php
    include('../../root.php');


    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $select_stmt = $pdo->prepare("SELECT * FROM research r
                                    LEFT JOIN exam e  ON e.teacher_id = r.personal_main AND r.research_id = e.research_id
                                    WHERE e.teacher_id = '".$_POST['personal_id']."' ");
        $select_stmt->execute();

        $data_arr = array();
        $data_arr["result"] = array();
        while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $data_items = array(
                "research_id" => $research_id,
                "tname" => $tname,
                "lname" => $lname,
                "fname" => $fname,
                "teacher_name" => $tname.$fname." ".$lname ,
                "name_th" => $name_th,
                "name_eng" => $name_eng,
                "types" => $types,
                "term" => $term,
                "year" => $year,
                "student_one" => $student_one,
                "student_two" => $student_two,
                "room" => $room,
                "ex_date1" => $ex_date1,
                "ex_time1" => $ex_time1,
                "ex_date2" => $ex_date2,
                "ex_time2" => $ex_time2,
                "ex_status" => $ex_status,
                "teacher1" => $teacher1,
                "teacher2" => $teacher2,
                "teacher3" => $teacher3
            );
            array_push($data_arr["result"], $data_items);

        }
        echo json_encode($data_arr);
        http_response_code(200);

    }
    else {
        http_response_code(405);
    }
?>