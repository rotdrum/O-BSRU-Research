<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ดาวน์โหลดเอกสาร</title>
    <?php include('root.php'); ?>
    <?php include('import.php'); ?>

</head>
<body>
<?php 
        if(isset($_REQUEST['student_id'])){
          include('session_student.php'); 

            include('student_navbarLogin.php'); 
        }
        else if(isset($_REQUEST['personal_id'])){
          include('session_personal.php'); 

            include('teacher_navbarLogin.php'); 
        }
        else{
            include('navbarNotLogin.php'); 
        }
    ?>

<section class="container">
      <h3 class="text-header">ดาวน์โหลดเอกสาร</h3>


      <!-- table -->
      <div class="table-scroll">
        <table class="table table-research">
            <thead>
              <tr>
                <th class="w-50">ลำดับ</th>
                <th>เอกสาร</th>
                <th class="w-150">รายละเอียด</th>
              </tr>
            </thead>
            <tbody>
            <?php 
            
            $count  = 1 ;
    $stmt = $pdo->query("select * from file_support ");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

   
    ?>
              <tr>
                <td><p class="p-td-center"><?php echo $count ; ?></p></td>
                <td>
                  <p><?php echo $row['title'] ; ?></p>
                </td>
                <td>
                    <a target="_blank" href="file_support/<?php echo $row['support_id'] ; ?>/<?php echo $row['address_file'] ; ?>" class="btn btn-primary">ดาวน์โหลด</a>
                </td>
              </tr>
              <?php 
              $count++;
}
    ?>
            
            </tbody>
          </table>
      </div>
    </section>
    <?php include('footer.php'); ?>
    
</body>
</html>