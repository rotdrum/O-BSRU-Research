<?php
    include('../../root.php');

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $select_stmt = $pdo->prepare("SELECT * FROM exam e
                                    LEFT JOIN research r ON e.research_id = r.research_id
                                    WHERE teacher1 = '".$_POST['personal_name']."' 
                                       OR teacher2 = '".$_POST['personal_name']."'
                                       OR teacher3 = '".$_POST['personal_name']."'
                                    ");
        $select_stmt->execute();

        $data_arr = array();
        $data_arr["result"] = array();
        while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $data_items = array(
                "research_id" => $research_id,
                "year" => $year,
                "student_one" => $student_one,
                "student_two" => $student_two,
                "teacher1" => $teacher1,
                "teacher2" => $teacher2,
                "teacher3" => $teacher3,
                "name_th" => $name_th,
                "status1" => $status1,
                "status2" => $status2,
                "status3" => $status3,
                "status4" => $status4
            );
            array_push($data_arr["result"], $data_items);

        }
        echo json_encode($data_arr);
        http_response_code(200);

    }
    else if($_SERVER['REQUEST_METHOD'] == "GET") {
        echo 'Reject';
    }
    else {
        http_response_code(405);
    }
?>