<?php

include('root.php');
include('rootSQL.php');

$personal_id = 1 ;

$stmt = $pdo->query("select * from personal ");
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $personal_id = $row['personal_id'];
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
          $personal_id =  mysqli_real_escape_string($connect, $personal_id + 1)  ;
          $tname = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(0, $row)->getValue());
          $fname = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
          $lname = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(2, $row)->getValue());
          $email = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(3, $row)->getValue());
          $tel = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(4, $row)->getValue());
          $username = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(5, $row)->getValue());
          $password = password_hash($worksheet->getCellByColumnAndRow(6, $row)->getValue(), PASSWORD_DEFAULT);
          $password = mysqli_real_escape_string($connect, $password);
          $dateofbirth = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(7, $row)->getValue());
          $status = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(8, $row)->getValue());
          $create_up = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(9, $row)->getValue());

          $query = "INSERT INTO personal(personal_id, tname, fname, lname, email,  tel, username, password, dateofbirth, status, create_up)  
          VALUES ('".$personal_id."', '".$tname."', '".$fname."', '".$lname."' , '".$email."', '".$tel."', '".$username."', '".$password."', '".$dateofbirth."' , '".$status."', '".$create_up."'    )";
          mysqli_query($connect, $query);


          /*
          $output .= '<td>'.$personal_id.'</td>';
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


header("Location: teacher_manage.php");
?>