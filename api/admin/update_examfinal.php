<?php
    include('../../root.php');


    if($_SERVER['REQUEST_METHOD'] == "POST") {
       
        $data_arr = array();
        $data_arr["result"] = array();

        date_default_timezone_set('Asia/Bangkok');
        $currentDate = date("Y-m-d H:i:s");

        $sql = "UPDATE exam  SET room = :room, ex_date2 = :ex_date2, ex_time2 = :ex_time2, ex_status = :ex_status, teacher1 = :teacher1, teacher2 = :teacher2, teacher3 = :teacher3 ,update_time = :update_time WHERE research_id = :research_id  ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([ 'research_id' => $_POST['research_id'], 
                        'room' => $_POST['room'], 
                        'ex_date2' => $_POST['ex_date'], 
                        'ex_time2' => $_POST['ex_time'],
                        'ex_status' => '5',
                        'teacher1' => $_POST['teacher1'],
                        'teacher2' => $_POST['teacher2'],
                        'teacher3' => $_POST['teacher3'],
                        'update_time' => $currentDate
                    ]);

        $data_items = array(
            "ms" => "good",
            "code" => 200
        );
        array_push($data_arr["result"], $data_items);

        
        echo json_encode($data_arr);
        http_response_code(200);

    }
    else {
        http_response_code(405);
    }
?>