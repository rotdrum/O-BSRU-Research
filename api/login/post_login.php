<?php
    include('../../root.php');
    

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $login_username = $_POST['username'];
    $_SESSION['login_username'] = $login_username;

    $key = $_GET['key'];
    $token = $_GET['token'];
    

    $flag = 0 ;
    $autu = "" ;

    if($key == "bansomdesh" && md5($token) == "7412df2b1db8cd2a5d4aafdb6c2090d3") {
        $stmt = $pdo->query("SELECT * FROM student WHERE username = '".$username."' ");
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){ 
            if($flag == 0) {
                if(password_verify($password, $row['password'])) {
                    $autu = "student_id" ;
                    $student_id = $row['student_id'] ;
                    $status = $row['status'];
                    $flag = 1 ;
                    $_SESSION['login_autu'] = $row['student_id'];
                    $_SESSION['login_status'] = "student";

                    $select_stmt = $pdo->prepare("SELECT * FROM student WHERE username = '".$username."'");
                    $select_stmt->execute();
                    while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
                        extract($row);
                        $data_arr = array();
                        $data_arr["result"] = array();
                        $data_items = array(
                            "autu" => "student_id",
                            "student_id" => $student_id,
                            "status" => $status,
                            "flag" => 1,
                            "login_state" => "success"
                        );
                        array_push($data_arr["result"], $data_items);
                    }
                    
                }
                else {
                    $data_arr = array();
                    $data_arr["result"] = array();
                    $data_items = array(
                        "login_state" => "fail"
                    );
                    array_push($data_arr["result"], $data_items);
                }
            }
        }; 
        

        if($flag == 0){
            $stmt = $pdo->query("SELECT * FROM personal WHERE username = '".$_POST['username']."' ");
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){ 
                if($flag == 0) {
                    if(password_verify($_POST['password'], $row['password'])) {
                        $autu = "personal_id" ;
                        $student_id = $row['personal_id'] ;
                        $status = $row['status'];
                        $flag = 1 ;
                        $_SESSION['login_status'] = "personal";
                        $_SESSION['login_autu'] = $row['personal_id'];


                        $select_stmt = $pdo->prepare("SELECT * FROM personal WHERE username = '".$username."'");
                        $select_stmt->execute();
                        while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
                            extract($row);
                            $data_arr = array();
                            $data_arr["result"] = array();
                            $data_items = array(
                                "autu" => "personal_id",
                                "student_id" => $student_id,
                                "status" => $status,
                                "flag" => 1,
                                "login_state" => "success"
                            );
                            array_push($data_arr["result"], $data_items);
                        }
                    }
                    else {
                        $data_arr = array();
                        $data_arr["result"] = array();
                        $data_items = array(
                            "login_state" => "fail"
                        );
                        array_push($data_arr["result"], $data_items);
                    }
                }
            }; 
        }

        echo json_encode($data_arr);
    }
}
else if($_SERVER['REQUEST_METHOD'] == "GET") {
    echo 'Reject';
}
else {
    http_response_code(405);
}


?>