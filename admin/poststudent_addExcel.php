<?php

include('root.php');
include('rootSQL.php');

$student_id = 1 ;

$stmt = $pdo->query("select * from student ");
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $student_id = $row['student_id'];
}

    $tmp = explode(".", $_FILES["excel"]["name"]);
    $extension = end($tmp);

    $allowed_extension = array("xls", "xlsx", "csv"); //allowed extension
    if(in_array($extension, $allowed_extension)){
        $file = $_FILES["excel"]["tmp_name"]; // getting temporary source of excel file
        include("../PHPExcel/Classes/PHPExcel/IOFactory.php"); // Add PHPExcel Library in this code
        $objPHPExcel = PHPExcel_IOFactory::load($file); // create object of PHPExcel library by using load() method and in load method define path of selected file
      
        // $output .= "<label class='text-success'>Data Inserted</label><br /><table class='table table-bordered'>";
        foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)
        {
          $highestRow = $worksheet->getHighestRow();
          for($row=2; $row<=$highestRow; $row++)
          {
          //$output .= "<tr>";
          $student_id =  mysqli_real_escape_string($connect, $student_id + 1)  ;
          $tname = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(0, $row)->getValue());
          $fname = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
          $lname = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(2, $row)->getValue());
          $class = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(3, $row)->getValue());
          $field = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(4, $row)->getValue());
          $faculty = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(5, $row)->getValue());
          $email = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(6, $row)->getValue());
          $tel = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(7, $row)->getValue());
          $student_card = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(8, $row)->getValue());
          $username = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(9, $row)->getValue());
          $password = password_hash($worksheet->getCellByColumnAndRow(10, $row)->getValue(), PASSWORD_DEFAULT);
          $password = mysqli_real_escape_string($connect, $password);
          $dateofbirth = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(11, $row)->getValue());
          $status = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(12, $row)->getValue());
          $research_id = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(13, $row)->getValue());
          $create_up = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(14, $row)->getValue());

          $query = "INSERT INTO student(student_id, tname, fname, lname, class, field, faculty, email,  tel, student_card, username, password, dateofbirth, status, research_id, create_up)  
          VALUES ('".$student_id."', '".$tname."', '".$fname."', '".$lname."', '".$class."', '".$field."', '".$faculty."' , '".$email."', '".$tel."', '".$student_card."', '".$username."', '".$password."', '".$dateofbirth."' , '".$status."', '".$research_id."', '".$create_up."'    )";
          mysqli_query($connect, $query);


          /*
          $output .= '<td>'.$student_id.'</td>';
          $output .= '<td>'.$names.'</td>';
          $output .= '<td>'.$class.'</td>';
          $output .= '<td>'.$room.'</td>';
          $output .= '<td>'.$ordinal.'</td>';
          $output .= '<td>'.$club_id.'</td>';
          $output .= '<td>'.$check_id.'</td>';
          $output .= '</tr>';
          */
          }
        } 
        //$output .= '</table>';
      } 


header("Location: student_manage.php");
?>