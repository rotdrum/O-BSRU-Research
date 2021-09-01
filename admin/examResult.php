<?php include('./session.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ผลการสอบ</title>
    <?php include('root.php'); ?>

    <?php include('import.php'); ?>

</head>
<body>
<?php include('navbar.php'); ?>

    

    <section class="main">
        <div class="btn btn-hamburger">
            <i class="fas fa-bars"></i>
        </div>
        
        <div class="sidebar">
            <?php include('sidebar.php'); ?>
        </div>
        <div class="dashboard">
            <h2 class="dashboard-title">ผลการสอบ</h2>

             <!-- table -->
        <div class="table-scroll">
            <table class="table table-research">
                <thead>
                    <tr>
                        <th class="w-50">ลำดับ</th>
                        <th class="w-300">ชื่อบัณฑิตนิพนธ์</th>
                        <th class="w-200">นักศึกษา</th>
                        <th class="w-50">ปีการศึกษา</th>
                        <th class="w-150">วันเวลาการสอบ</th>
                        <th class="w-150">สถานะ</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
    $count = 1 ;
    $stmt = $pdo->query("select * from exam   ");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                if($row['status_exam']==0){}
                else{
            ?>
                    <tr>
                        <td>
                            <p class="p-td-center"><?php echo $count ; ?></p>
                        </td>
                        <?php 
          $stmt2 = $pdo->query("select * from research where research_id = ".$row['research_id']."  ");
          while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
            ?>
                        <td>
                            <p>
                            <?php echo $row2['name_th'] ; ?>
                            </p>
                        </td>
                        <td>
                            <p><?php echo $row2['student_one'] ; ?></p>
                            <p><?php echo $row2['student_two'] ; ?></p>
                        </td>
                        <td>
                            <p class="p-td-center"><?php echo $row2['year'] ; ?></p>
                        </td>
                        <?php 
          }
            ?>
                        <td>
                            <p class="p-td-center"><?php echo $row['dateofexam'] ; ?></p>
                        </td>
                        <td>
                        <?php 
                        if($row['status_exam']==1){
                        ?>
                        <p class="color-success p-td-center">
                        <i class="fas fa-circle"></i> ผ่าน
                        <?php 
                        }
                        ?>
                        <?php 
                        if($row['status_exam']==2){
                        ?>
                        <p class="color-warning p-td-center">
                        <i class="fas fa-circle"></i> ผ่านมีเงื่อนไข
                        <?php 
                        }
                        ?>
                        <?php 
                        if($row['status_exam']==3){
                        ?>
                        <p class="color-danger p-td-center">
                        <i class="fas fa-circle"></i> ไม่ผ่าน
                        <?php 
                        }
                        ?>


                        <?php 
                        if($row['status_file']==4){
                        ?>
                        บัณฑิตนิพนธ์สมบูรณ์
                        </p>
                        <?php 
                        }
                        ?>
                        <?php 
                        if($row['status_file']==3){
                        ?>
                        ป้องกันบัณฑิตนิพนธ์
                        </p>
                        <?php 
                        }
                        ?>
                          <?php 
                        if($row['status_file']==2){
                        ?>
                        ก้าวหน้าบัณฑิตนิพนธ์
                        </p>
                        <?php 
                        }
                        ?>
                          <?php 
                        if($row['status_file']==1){
                        ?>
                        หัวข้อบัณฑิตนิพนธ์
                        </p>
                        <?php 
                        }
                        ?>
                            
                        </td>
                    </tr>
                    <?php 
    $count++ ;
}

}
            ?>
 
                 
                </tbody>
            </table>
        </div>

        </div>
    </section>
</body>
</html>