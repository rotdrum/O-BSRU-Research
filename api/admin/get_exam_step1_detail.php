<?php
    include('../../root.php');


    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $select_stmt = $pdo->prepare("SELECT * FROM research r LEFT JOIN personal p ON r.personal_main = p.personal_id WHERE research_id = '". $_POST['id']."'  ");
        $select_stmt->execute();

        $data_arr = array();
        $data_arr["result"] = array();
        while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $data_items = array(
                "research_id" => $research_id,
                "name_th" => $name_th,
                "name_eng" => $name_eng,
                "look" => $look,
                "types" => $types,
                "term" => $term,
                "year" => $year,
                "personal_main" => $personal_main,
                "personal_sup" => $personal_sup,
                "student_one" => $student_one,
                "student_two" => $student_two,
                "abstract" => $abstract,
                "file1" => $file1,
                "file2" => $file2,
                "file3" => $file3,
                "file4" => $file4,
                "status1" => $status1,
                "status2" => $status2,
                "status3" => $status3,
                "status4" => $status4,
                "create_up" => $create_up,
                "update_up" => $update_up,
                "personal_main" => $tname.$fname." ".$lname
            );
            array_push($data_arr["result"], $data_items);
        }

        $select_stmt = $pdo->prepare("SELECT * FROM research r LEFT JOIN personal p ON r.personal_sup = p.personal_id WHERE research_id = '". $_POST['id']."'  ");
        $select_stmt->execute();
        while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $data_items = array(
                "personal_sub" => $tname.$fname." ".$lname
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