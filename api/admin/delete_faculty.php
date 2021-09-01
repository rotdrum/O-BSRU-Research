<?php
    include('../../root.php');


    if($_SERVER['REQUEST_METHOD'] == "POST") {
       
        $data_arr = array();
        $data_arr["result"] = array();

        date_default_timezone_set('Asia/Bangkok');
        $currentDate = date("Y-m-d H:i:s");

        $sql = "DELETE FROM selection WHERE selection_id = '".$_POST['id']."' ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

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