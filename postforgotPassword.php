<?php
include('root.php');
use PHPMailer\PHPMailer\PHPMailer;

$student_id = 0 ;
$personal_id = 0 ;

$dateofbirth = "" ;
$email = "";

function generateRandomString($length = 8) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}

$password =  generateRandomString();

$stmt = $pdo->query("select * from student where username = '".$_POST['username']."' ");
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $student_id = $row['student_id'] ;
    $dateofbirth = $row['dateofbirth'] ;
    $email = $row['email'];
}

$stmt = $pdo->query("select * from personal where username = '".$_POST['username']."' ");
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $personal_id = $row['personal_id'] ;
    $dateofbirth = $row['dateofbirth'] ;
    $email = $row['email'];
}


if(($student_id == 0) && ($personal_id == 0)){
    header("Location: forgotPasswordAlert.php");
}
else if($dateofbirth != $_POST['dateofbirth']){
    header("Location: forgotPasswordAlert.php");
}
else if(($student_id > 0) && ($dateofbirth == $_POST['dateofbirth'])){
    $name = "WebResearch!";
    $header = "Reset Password";
    $detail = "บัญชีผู้ใช้ : ".$_POST['username']." รหัสผ่าน : ".$password;

    require_once "PHPMailer/PHPMailer.php";
    require_once "PHPMailer/SMTP.php";
    require_once "PHPMailer/Exception.php";

    $mail = new PHPMailer();

    // SMTP Settings
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "realbearpro@gmail.com"; // enter your email address
    $mail->Password = "Dkigiupo@1452"; // enter your password
    $mail->Port = 465;
    $mail->SMTPSecure = "ssl";

    //Email Settings
    $mail->isHTML(true);
    $mail->setFrom($email, $name);
    $mail->addAddress($email); // Send to mail
    $mail->Subject = $header;
    $mail->Body = $detail;

    if($mail->send()) {
        $status = "success";
        $response = "Email is sent";
    } else {
        $status = "failed";
        $response = "Something is wrong" . $mail->ErrorInfo;
    }

    // exit(json_encode(array("status" => $status, "response" => $response)));


    $sql = "UPDATE student  SET password = :password  WHERE student_id = :student_id  ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([ 'student_id' => $student_id, 'password' => password_hash($password, PASSWORD_DEFAULT) ]);

    $sql = "UPDATE student  SET status = :status  WHERE student_id = :student_id  ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([ 'student_id' => $student_id, 'status' => 9 ]);

    header("Location: forgotPasswordSend.php");
}
else if(($personal_id > 0) && ($dateofbirth == $_POST['dateofbirth'])){
    $name = "WebResearch!";
    $header = "Reset Password";
    $detail = "บัญชีผู้ใช้ : ".$_POST['username']." รหัสผ่าน : ".$password;

    require_once "PHPMailer/PHPMailer.php";
    require_once "PHPMailer/SMTP.php";
    require_once "PHPMailer/Exception.php";

    $mail = new PHPMailer();

    // SMTP Settings
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "realbearpro@gmail.com"; // enter your email address
    $mail->Password = "Dkigiupo@1452"; // enter your password
    $mail->Port = 465;
    $mail->SMTPSecure = "ssl";

    //Email Settings
    $mail->isHTML(true);
    $mail->setFrom($email, $name);
    $mail->addAddress($email); // Send to mail
    $mail->Subject = $header;
    $mail->Body = $detail;

    if($mail->send()) {
        $status = "success";
        $response = "Email is sent";
    } else {
        $status = "failed";
        $response = "Something is wrong" . $mail->ErrorInfo;
    }

    // exit(json_encode(array("status" => $status, "response" => $response)));


    $sql = "UPDATE personal  SET password = :password  WHERE personal_id = :personal_id  ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([ 'personal_id' => $personal_id, 'password' => password_hash($password, PASSWORD_DEFAULT) ]);

    $sql = "UPDATE personal  SET status = :status  WHERE personal_id = :personal_id  ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([ 'personal_id' => $personal_id, 'status' => 9 ]);

    header("Location: forgotPasswordSend.php");
}


?>