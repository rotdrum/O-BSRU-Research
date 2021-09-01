<?php
    include('../../root.php');

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $select_stmt = $pdo->prepare("SELECT * FROM research WHERE personal_main = '".$_POST['personal_id']."' ");
        $select_stmt->execute();

        $data_arr = array();
        $data_arr["result"] = array();
        while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $data_items = array(
                "research_id" => $research_id,
                "name_th" => $name_th,
                "year" => $year,
                "student_one" => $student_one,
                "student_two" => $student_two,
                "status1" => $status1,
                "status2" => $status2,
                "status3" => $status3,
                "status4" => $status4,
                "personal_main" => $personal_main,
                "personal_sub" => $personal_sup,
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