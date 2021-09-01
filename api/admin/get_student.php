<?php
    include('../../root.php');


    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $select_stmt = $pdo->prepare("SELECT * FROM student WHERE student_id = '".$_POST['student_id']."' ");
        $select_stmt->execute();

        $data_arr = array();
        $data_arr["result"] = array();
        while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $data_items = array(
                "faculty" => $faculty,
                "field" => $field
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